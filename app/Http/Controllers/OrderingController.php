<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class OrderingController extends Controller
{
    public function index()
    {
        $order = DB::table('order')
                            ->join('subscription','order.subcription','=','subscription.id')
                            ->join('profile','order.id_customer','=','profile.id')
                            ->select('order.*','subscription.name AS subsName','profile.*')
                            ->orderBy('order.date_delivery','ASC')
                            ->get();
                            


        return view('admin.ordering.index',['order'=>$order]);
    }
}
