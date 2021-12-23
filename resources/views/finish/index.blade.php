@extends('template.home')

@section('title','Finish')

@section('main')

<div class="fudiku-finish-area">
    <div class="container-lg">
        <div class="finish-content">
            <div class="finish-img">
                <img src="{{ asset('img/vector/cs.png') }}" alt="">
            </div>
            <div class="finish-title">
                <h5 class="title">Tunggu Cutomer Service kami menghubungimu</h5>
            </div>
        </div>
    </div>
</div>

<div class="mobile-bottom-nav fixed-bottom">
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
@endsection