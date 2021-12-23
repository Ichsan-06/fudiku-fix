@extends('template.home')

@section('title','Fudiku - Cara Baru Pesan Catering')

@section('main')



<div class="fudiku-payment-area">
    <div class="container-lg">
        <div class="payment-title">
            <h5 class="title">Pilih Metode Pembayaran</h5>
        </div>
        <div class="payment-content">
            <form action="{{ route('payment.post') }}" method="post">
                @csrf
                <div class="row">
                    @foreach ($table as $payment)
                    <div class="col-md-4">
                        <div class="payment-method">
                            <div class="payment">
                                <input type="radio" name="payment" id="{{ $payment->name }}" value="{{ $payment->name }}">
                                <label  for="{{ $payment->name }}">
                                    <input type="hidden" name="code" value="{{ $code }}">
                                    <div class="payment-logo">
                                            <img src="{{ asset("img/payment/$payment->image") }}" alt="">
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
                <div class="payment-cta">
                    {{-- <input type="hidden" name="email"> --}}
                    <button class="btn next">Lanjutkan</button>    
                </div>
            </form>
        </div>    
    </div>
</div>




@endsection