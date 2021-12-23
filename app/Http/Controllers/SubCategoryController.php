<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('sub_category')->get();
        $dataK = DB::table('category')->get();

        return view('admin.subcategory.index',['tb_subcategory'=>$data,'tb_category'=>$dataK]);
    }
    public function tambah(Request $request)
    {
        DB::table('sub_category')->insert([
            'name' => $request->name,
            'parentId'=>$request->kategori,
            'information'=>$request->deskripsi,
            'isActive'=> 1,
        ]);
        return redirect('admin/subCategory');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function active(Request $request,$id)
    {
        //
        $kategori = DB::table('sub_category')
                    ->where('id',$id)
                    ->update([
                        'isActive'=> $request->value,
                    ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // $data = DB::table('sub_category')->where('id',$id)->first();
        // $dataK = DB::table('category')->where('id',$data->parentId)->first();
        // return view('admin.subcategory.update',['tb_subcategory'=>$data,'parentId'=>$dataK]);
        $student = DB::table('sub_category')
                    ->where('id',$id)
                    ->update([
                        'name'=> $request->input('name'),
                        'information'=> $request->input('deskripsi'),
                        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('sub_category')->where('id',$id)->delete();
        return redirect('admin/subCategory');
    }
}
