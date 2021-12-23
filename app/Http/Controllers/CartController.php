<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::check()) 
        {
            $idUser =  auth()->user()->id;
            $table_payment = DB::table('payment')
                                ->where('id_user',$idUser)
                                ->orderBY('created_at','DESC')
                                ->get();
            $count = DB::table('payment')
                                ->where('id_user',$idUser)
                                ->orderBY('created_at','DESC')
                                ->count();
            if($count > 0){
                return view('cart.index',[
                    'table_payment'   => $table_payment
                ]);
            }
            else{
                return view('cart.null',[
                    'table_payment'   => $table_payment
                ]);
            }
            
            
        }
        else{
            return view('cart.notLogin');
        }

        
    }
    public function detail()
    {
        //
        return view('cart.detail');
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
    public function store(Request $request)
    {
        //
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
