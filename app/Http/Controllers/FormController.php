<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Carbon\Carbon;
use DB;
use Auth;
class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        // $tanggal = explode(',',$request->tanggal);
        // $dates = count($tanggal);
        // for ($i=0; $i < $dates ; $i++) {
        //     $tanggal[$i] = date("Y-m-d", strtotime($tanggal[$i]));

        //     $table = DB::table('product')->where('date_delivery',$tanggal[$i])->first();

        //     if ($table == null) {
        //         // return redirect()->back()->with('message','Harap Mengecek Ketersediaan makanan pada tanggal')->withInput();
        //         redirect()->action('MenuCon@edit');
        //     }
        //     else{
        //         echo "yes";
        //     }
        // }
        $tableMap = DB::table('map')->get();
        $kecamatan =  DB::table('map')
                    ->where('kabupaten',$request->location)
                    ->first();

        if (!Auth::guest()){
            
            return view('form.index',[
                'date_delivery' => $request->tanggal,
                'id_subcategory'=> $request->id_subcategory,
                'id_subscription'   => $request->id_subscription,
                'table_map'     => $tableMap,
                'location'      => $request->location,
                'kecamatan'     => $kecamatan->kecamatan,
                'email'         => $id_user = Auth::user()->email,
            ]);
           
        }
        else{            
            return view('form.index',[
                'date_delivery' => $request->tanggal,
                'id_subcategory'=> $request->id_subcategory,
                'id_subscription'   => $request->id_subscription,
                'table_map'     => $tableMap,
                'location'      => $request->location,
                'kecamatan'     => $kecamatan->kecamatan,
                'email'     => null
               
            ]);
        }

       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function post(Request $request)
    {
        if (!Auth::guest()){
            $id_user = Auth::user()->id;
        }
        else{            
            $id_user = null;
        }

        Profile::insert([
            'full_name' => $request->full_name, 
            'email'     => $request->email, 
            'phone'     => $request->phone,
            'kota'      => 'Medan',
            'kabupaten' => $request->kabupaten,
            'kecamatan' => $request->kecamatan,
            'alamat_lengkap'=> $request->address,
            'id_user'   => $id_user,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
        ]);
        
        $codeOrder = getCodeUnique();
        $idProfile = Profile::latest()->first();
        $tanggal = explode(',',$request->date_delivery);
        // var_dump($idProfile->id);echo "<br>";
        $dates = count($tanggal);
        for ($i=0; $i < $dates ; $i++) {
            $tanggal[$i] = date("Y-m-d", strtotime($tanggal[$i])); 
            DB::table('order')->insert([
                'sub_category'=>$request->id_subcategory,
                'id_customer'    => $idProfile->id,
                'subcription'    => $request->id_subscription,
                'date_delivery' => $tanggal[$i],
                'code_order'    =>$codeOrder,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ]);
        }

        return redirect("payment/$codeOrder");

    }

    public function formLocation(Request $request)
    {
        $table = DB::table('map')->where('kabupaten',$request->kabupaten)->get();

        $kecamatan = "";
        
        foreach ($table as $data) {
            $kecamatan .= '<option value="'.$data->kecamatan.'">'.$data->kecamatan.'</option>';
        }

        echo $kecamatan;
    }
}
