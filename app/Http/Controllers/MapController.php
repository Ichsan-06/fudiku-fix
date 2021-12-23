<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class MapController extends Controller
{
    //
    public function index()
    {
        $data = DB::table('map')->get();
        return view('admin.map.index',['data'=>$data]);
    }
    public function create(Request $request)
    {
        $data = DB::table('map')->insert([
            'kabupaten'=>$request->kabupaten,
            'kecamatan'=>$request->kecamatan
        ]);
        return back()->with('success','Succes Insert Data');   
    }
    public function update(Request $request, $id)
    {
        $data = DB::table('map')->whereId($id)->update([
            'kabupaten'=>$request->kabupaten,
            'kecamatan'=>$request->kecamatan,
            
        ]);
        return back()->with('success','Succes Insert Data');   
    }
    public function delete($id)
    {
        $data = DB::table('map')->whereId($id)->delete();
        return back()->with('success','Succes Delete Data');   

    }
}
