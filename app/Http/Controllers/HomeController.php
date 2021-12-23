<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role:ROLE_USER');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
       $table = DB::table('payment')
                    ->get();
    //    echo  $payment  = DB::table('payment')
    //                 ->where( 'created_at', '<', Carbon::now()->subDay(1))
    //                 // ->where('status','0')
    //                 ->count();

        foreach ($table as $data) {
            // DB::table('order')->where('code_order',$data->code_order)->delete();
            $tgl = $data->created_at;
            $date = Carbon::parse("$tgl")->addHour(24);
            
            if ($date < Carbon::now()) {
                DB::table('payment')->where('code_order',$data->code_order)->update(['status' => '4']);
                // echo "Berhasil";
            }
        }
    // $tgl = $payment->created_at;
    // echo $date = Carbon::parse("$tgl")->addHour(24);
    }
    public function index()
    {
        $categories = DB::table('category')->get();
        return view('home.index',['categories'=> $categories]);
    }

}
