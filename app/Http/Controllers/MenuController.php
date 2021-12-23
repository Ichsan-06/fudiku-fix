<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
use Carbon\Carbon;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index($location)
    {
        
        // $this->cekLocation($location);
        // //
        $categories = DB::table('category')
                        ->where('isActive','1')
                        ->orderByRaw('id ASC')
                        ->get();
        $getIdCategories = DB::table('category')
                        ->where('isActive','1')
                        ->orderByRaw('id ASC')
                        ->first();
        $subCategory = DB::table('sub_category')
                        ->where('isActive','1')
                        ->where('parentId',$getIdCategories->id)
                        ->get();
                        $count = DB::table('sub_category')
                        ->where('isActive','1')
                        ->where('parentId',$getIdCategories->id)
                        ->count();
        $map = DB::table('map')->where('kabupaten',$location)->count();
        
        if($map == 0){
            return view(404);
        }
        else{
        return view('menu.index',[
                'categories'=> $categories,
                'sub_category'=> $subCategory,
                'slug'      => '',
                'location'  => $location,
                'count'     => $count
                ]);
            }
    }
    public function search(Request $request)
    {
        
        // $this->cekLocation($location);
        // //
        $categories = DB::table('category')
                        ->where('isActive','1')
                        ->orderByRaw('id ASC')
                        ->get();
        $getIdCategories = DB::table('category')
                        ->where('isActive','1')
                        ->orderByRaw('id ASC')
                        ->first();
        $subCategory = DB::table('sub_category')
                        ->where('isActive','1')
                        ->where('parentId',$getIdCategories->id)
                        ->get();
                        $count = DB::table('sub_category')
                        ->where('isActive','1')
                        ->where('parentId',$getIdCategories->id)
                        ->count();
        $map = DB::table('map')->where('kabupaten',$request->location)->count();
        
        if($map == 0){
            return view(404);
        }
        else{
        return view('menu.index',[
                'categories'=> $categories,
                'sub_category'=> $subCategory,
                'slug'      => '',
                'location'  => $request->location,
                'count'     => $count
                ]);
            }
    }
    public function byCategory($slug,$location)
    {
        $catBySlug = DB::table('category')->where('slug',$slug)->first();
        
        $subCategory = DB::table('sub_category')->where('parentId',$catBySlug->id)->get();
        $count = DB::table('sub_category')->where('parentId',$catBySlug->id)->count();
        $categories = DB::table('category')
                        ->where('isActive','1')
                        ->orderByRaw('id ASC')
                        ->get();

        $map = DB::table('map')->where('kabupaten',$location)->count();

        if($map == 0){
            return view(404);
        }
        else{
        return view('menu.byCategory',[
                'categories'=> $categories,
                'sub_category'=> $subCategory,
                'location'  => $location,
                'count'  => $count,
                'slug'  => $slug
                ]);
            }
    }

   
   
   
    public function sortBy($slug)
    {
        $categories = DB::table('category')
                        ->where('isActive','1')
                        ->get();
        $catBySlug = DB::table('category')
                        ->where('isActive','1')
                        ->where('slug',$slug)
                        ->first();


        $subCategory = DB::table('sub_category')
                        ->where('isActive','1')
                        ->where('parentId',$catBySlug->id)
                        ->get();
        
        return view('menu.index',[
                'categories'=> $categories,
                'sub_category'=> $subCategory,
                'slug'  => $slug,
                ]);
    }

    

}