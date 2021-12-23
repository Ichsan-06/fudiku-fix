@extends('template.home')

@section('title','Fudiku - Cara Baru Pesan Catering')

@section('main')

<div class="fudiku-cod-area">
    <div class="container-lg">
        <div class="cod-content">
            <form action="">
                <div class="cod-img">
                    <img src="{{ asset('img/vector/cs.png') }}" alt="">
                </div>
                <div class="cod-title">
                    <h5 class="title">Tunggu Customer Kami Menghubungi Anda</h5>
                </div>
                <div class="cod-cta">
                    <!-- <a href="{{ url("/") }}" class="btn btn-update">Kembali Ke Home</a> -->
                    <br>
                    {{-- <a href="{{ url("payment/update/$code") }}" class="btn btn-update">Ubah Metode</a> --}}
                </div>
            </form>
        </div>
    </div>
</div>

<div class="mobile-bottom-nav">
  <nav class="navbar navbar-expand-lg">
    <div class="container-lg">
      <ul class="navbar-nav">
        <li class="nav-item">
            <a href="{{ route('profile') }}" class="nav-link"><i class="flaticon-user"></i></a>
            Profile
        </li>
        <li class="nav-item active">
            <a href="{{ route('home') }}" class="nav-link"><i class="flaticon-house"></i></a>
            Home
        </li>
        <li class="nav-item">
            <a href="{{ route('cart') }}" class="nav-link"><i class="flaticon-shopping-bag"></i></a>
            Cart
        </li>
      </ul>
    </div>
  </nav>
</div>



<style>
@media(min-width: 576px){
    
    
}    
@media(max-width: 576px){
    
    
}    



</style>

@endsection