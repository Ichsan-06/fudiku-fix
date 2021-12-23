@extends('template.home')

@section('title','Payment')

@section('main')


<div class="fudiku-payment-confirm">
    <div class="container-lg">
        <div class="payment-schedule">
            <h6>Batas Akhir</h6>
            <p>Minggu, 18 Okt 2020 13.00 WIB</p>
        </div>
        <div class="payment-confirm">
            <h6>Konfirmasi Pembayaran</h6>
            <div class="logo">
            </div>
        </div>
        <div class="payment-form">
            <div class="form-group">
                <label for="">Nomor Rekening</label>
                <input type="text" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Atas Nama</label>
                <input type="text" class="form-control">
            </div>
        </div>
        
        <div class="payment-cth">
            <form action="{{ route('payment.confirm') }}">
                <button class="btn">Konfirmasi</button>
            </form>
        </div>
    </div>
</div>

@endsection