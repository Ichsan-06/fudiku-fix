<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class TransferController extends Controller
{
    public function index()
    {
        $transfer = DB::table('transfer')->get();
        return view('admin.transfer.index',[
            'table' => $transfer,
        ]);
    }
    public function post(Request $request)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);

        $file = $request->file('logo');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'img/payment';
        $file->move($tujuan_upload,$nama_file);
    
        $data = DB::table('transfer')->insert([
            'name'      => $request->name,
            'no_rekening'      => $request->no_rekening,
            'name_rekening'      => $request->name_rekening,
            'image'      => $nama_file,
        ]);

        return back()->with('success','Succes Insert Data');
    }

    public function delete($id)
    {
        $transfer = DB::table('transfer')->whereId($id)->delete();

        return back()->with('success','Succes Delete Data');
    }

    public function update($id)
    {
        $table = DB::table('transfer')->whereId($id)->first();
        return view('admin.transfer.update',['transfer'=>$table]);
    }

    public function postUpdate(Request $request)
    {
        if($request->hasFile('logo')){
       
            
            
        $file = $request->file('logo');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'img/payment';
        $file->move($tujuan_upload,$nama_file);

        $categories = DB::table('transfer')
                    ->where('id',$request->id)
                    ->update([
                        'name'      => $request->name,
                        'no_rekening'      => $request->no_rekening,
                        'name_rekening'      => $request->name_rekening,
                        'image'      => $nama_file,
                    ]);
        }
        else{
            $categories = DB::table('transfer')
                    ->where('id',$request->id)
                    ->update([
                        'name'              => $request->name,
                        'no_rekening'       => $request->no_rekening,
                        'name_rekening'     => $request->name_rekening,
                    ]);
        }
        return redirect('admin/transfer')->with('success','Succes Delete Data');    
    }
    
}
