<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;
use DB;
class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tb_subscription = Subscription::all();
        $tb_category    = DB::table('category')->get();
        return view('admin.subscription.index',[
            'tb_subscription'=>$tb_subscription,
            'tb_category'  => $tb_category
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Subscription::insert([
            'name'          => $request->name,
            'duration'      => $request->duration,
            'price'         => $request->price,
            'discount'      => $request->discount,
            'id_category'   => $request->category,
            // 'created_at'    => $request-,
            // 'updated_at'
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
        Subscription::whereId($request->id)
            ->update([
            'name'          => $request->name,
            'duration'      => $request->duration,
            'price'         => $request->price,
            'discount'      => $request->discount,
            'id_category'   => $request->category,
            // 'updated_at'
        ]);
        return redirect('admin/subscription')->with('success','Succes Update Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tb_subscription = Subscription::whereId($id)->first();
        $tb_category    = DB::table('category')->get();
        return view('admin.subscription.update',[
            'tb_subscription'=>$tb_subscription,
            'tb_category'  => $tb_category
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subscription::whereId($id)->delete();
        return redirect('admin/subscription')->with('success','Succes Delete Data');
    }
}
