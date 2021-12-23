<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::
                    select('product.id','product.name as name_product','date_delivery','image','sub_category.name')
                    ->orderBy('date_delivery', 'DESC')
                    ->join('sub_category', 'product.id_sub_category', '=', 'sub_category.id')
                    ->get();
        return view('admin.product.index',['tb_product'=>$data]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);

        $file = $request->file('image');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'img/product';
        $file->move($tujuan_upload,$nama_file);
    
        $data = Product::insert([
            'name'      => $request->name,
            'date_delivery'      => $request->date_delivery,
            'image'      => $nama_file,
            'id_sub_category'      => $request->category,
            'created_at'    => Carbon::now(),
        ]);
        return back()->with('success','Succes Insert Data');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tbl_product = Product::
        select('product.id','product.name as name_product','date_delivery','image','id_sub_category','sub_category.name')
        ->where('product.id',$id)
        ->join('sub_category', 'product.id_sub_category', '=', 'sub_category.id')
        ->first();

        $category = DB::table('sub_category')
                ->where('isActive','1');
        return view('admin.product.update',['tbl_product'=>$tbl_product,'tbl_category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $file = $request->file('image');

        if($request->hasFile('image')){
            $file = $request->file('image');
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = 'img/product';
            $file->move($tujuan_upload,$nama_file);

            $data = Product::whereId($request->id)
                ->update([
                'name'      => $request->name,
                'date_delivery'     => $request->date_delivery,
                'image'      => $nama_file,
                'id_sub_category'      => $request->category,
                'created_at'    => Carbon::now(),
            ]);
            return redirect('admin/product')->with('success','Data Has Change');
        }
        else{
            $data = Product::whereId($request->id)
                ->update([
                'name'      => $request->name,
                'date_delivery'     => $request->date_delivery,
                'id_sub_category'      => $request->category,
            ]);
            return redirect('admin/product')->with('success','Data Has Change.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect('admin/product');
    }
}
