<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Auth;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($code)
    {
        $transfer = DB::table('transfer')->get();
        return view('payment.index',['code'=> $code,'table'=>$transfer]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function post(Request $request)
    {
        // dd($request->all());
        $tableOrder = DB::table('order')->where('code_order',$request->code)->first();
        $idSubcription = DB::table('subscription')->whereId($tableOrder->subcription)->first();

        if (!Auth::guest()){
            $id_user = Auth::user()->id;
        }
        else{
            $id_user = null;
        }


        // vardump($request);
        if ($request->payment == 'COD') {
            DB::table('payment')->insert([
                'code_order' => $request->code,
                'transfer'   => $request->payment,
                'amount'     => $idSubcription->price,
                'status'    => '2',
                'image'     => $request->image,
                'id_user'   => $id_user,
                'created_at'    => Carbon::now(),
            ]);
            return redirect("payment/cod/$request->code");
        }
        else{
            DB::table('payment')->insert([
                'code_order' => $request->code,
                'transfer'   => $request->payment,
                'amount'     => $idSubcription->price,
                'status'    => '0',
                'image'     => $request->image,
                'id_user'   => $id_user,
                'created_at'    => Carbon::now(),
            ]);
            return redirect("payment/detail/$request->code");
        }

    }
    public function cod($code)
    {
        $payment = DB::table('payment')
                ->where('code_order',$code)->first();

        $order  = DB::table('order')
                ->select('subscription.name as subsName','category.name as nameCategory','subscription.duration')
                ->join('subscription','order.subcription','=','subscription.id')
                ->join('sub_category','order.sub_category','=','sub_category.id')
                ->join('category','sub_category.parentId','=','category.id')
                ->where('code_order',$code)->first();

        $name = DB::table('order')
                ->join('profile','order.id_customer','=','profile.id')
                ->where('order.code_order',$code)->first();

        $email_data = array(
                    'name' => $name->full_name,
                    'metode'=>$payment->transfer,
                    'jumlah'=>$payment->amount,
                    'paket'=>$order->nameCategory,
                    'duration'=>$order->duration,
                    'subsName'=>$order->subsName,
                );
         $alamat = $name->email;
        // return new \App\Mail\WelcomeMail($email_data);
        // Mail::to("$alamat")->send(new \App\Mail\WelcomeMail($email_data));

        return view('payment.cod');
    }

    public function detail($code)
    {
        $table = DB::table('payment')
            ->join('transfer','payment.transfer','=','transfer.name')
            ->where('payment.code_order',$code)
            ->first();
        // echo $table->name;

        $db_order = DB::table('order')
                        ->join('subscription','order.subcription','=','subscription.id')
                        ->join('profile','order.id_customer','=','profile.id')
                        ->where('order.code_order',$code)
                        ->first();
        return view('payment.detail',['table'=>$table,'db_order'=>$db_order,'code'=>$code]);

    }




    public function postDetail(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
          ]);

        $file = $request->file('image');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'img/bukti';
        $file->move($tujuan_upload,$nama_file);

        DB::table('payment')->where('code_order',$request->code)->update([
            'payment_date' => Carbon::now(),
            'status'  => '1',
            'no_rekening'   => $request->no_rekening,
            'name_rekening' => $request->name_rekening,
            'image'         => $nama_file,
        ]);

        // // dd($request->all());
        $code_order = $request->code;

        $payment = DB::table('payment')
                    // ->join('users','payment.id_user','=','users.id')
                    ->where('code_order',$code_order)->first();

        $order  = DB::table('order')
                ->select('subscription.name as subsName','category.name as nameCategory','subscription.duration')
                ->join('subscription','order.subcription','=','subscription.id')
                ->join('sub_category','order.sub_category','=','sub_category.id')
                ->join('category','sub_category.parentId','=','category.id')
                ->where('code_order',$code_order)->first();

        $name = DB::table('order')
                ->join('profile','order.id_customer','=','profile.id')
                ->where('order.code_order',$code_order)->first();

        $email_data = array(
            'name' => $name->full_name,
            'metode'=>$payment->transfer,
            'jumlah'=>$payment->amount,
            'paket'=>$order->nameCategory,
            'duration'=>$order->duration,
            'subsName'=>$order->subsName,
        );
        // return new \App\Mail\WelcomeMail($email_data);
        $alamat = $request->email;
        // Mail::to("$alamat")->send(new \App\Mail\WelcomeMail($email_data));
        return redirect('/finish');
    }


    public function change($code)
    {
        $transfer = DB::table('transfer')->get();
        return view('payment.change',['code'=> $code,'table'=>$transfer]);
        //
    }
    public function postChange(Request $request)
    {
        var_dump($request->all());




        if ($request->payment == 'COD') {
            $table = DB::table('payment')
                        ->where('code_order',$request->code)
                        ->update([
                            'transfer'=>$request->payment,
                            'status'    => '2'
                            ]);

            return redirect("payment/cod/$request->code");
        }
        else{
            $table = DB::table('payment')
                        ->where('code_order',$request->code)
                        ->update([
                            'transfer'=>$request->payment,
                            ]);
            return redirect("payment/detail/$request->code");
        }
        // return redirect("payment/detail/$request->code");
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
        $tableOrder = DB::table('order')->where('code_order',$request->code)->first();
        $idSubcription = DB::table('subscription')->whereId($tableOrder->subcription)->first();
        if (!Auth::guest()){
            $id_user = Auth::user()->id;
        }
        else{
            $id_user = null;
        }

        DB::table('payment')->insert([
            'code_order' => $request->code,
            'transfer'   => $request->payment,
            'amount'     => $idSubcription->price,
            'status'    => '0',
            'image'     => $request->image,
            'id_user'   => $id_user,
            'created_at'    => Carbon::now(),
        ]);

        // vardump($request);
        return redirect("payment/detail/$request->code");
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
    public function finish()
    {
        return view('pickup/finish');
    }
}
