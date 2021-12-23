<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $city = DB::table('map')->get();
        return view('location.index',['city'=>$city]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        
                
        // $table = DB::table('map')
        //                     ->where('location','Medan')
        //                     ->orWhere('location','like', '%' . $request->query . '%')->count();

        // $output = '<ul class="list-unstyled">';
        // if ($count > 0) {
        //     foreach ($table as $map) {
        //         $output .= '<li>'.$map->location.'</li>';
        //     }
        // }
        // else{
        //     $output .= '<li>Country Not Found</li>';
        // }

        // $output .= "</ul>";
        // echo $output;

        if ($request->get('query')) {
            $query = $request->get('query');
            $table = DB::table('map')->where('kabupaten','Medan')->orWhere('kabupaten','like', '%' . $query. '%')->get();
            
            $output = '<div class="location-search dropdown-item">';
            foreach ($table as $map) {
                        $output .= '<a href="#" class="location-search-list dropdown-item">'.$map->kabupaten.'</a>';
            }
            $output .= "</div>";
            
            echo $output;
        }

    }
    public function post(Request $request)
    {
        // echo $request->location;
        // dd($request);
        return redirect("menu/$request->location");
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
    }
}
