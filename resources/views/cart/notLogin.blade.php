@extends('template.home')

@section('title','Profile')

@section('main')


<div class="fudiku-cart-empty-area">
    <div class="container-lg">
        <div class="cart-empty-content">
            <div class="cart-empty-img">
              <img src="{{ asset('img/vector/empty-cart.png') }}" alt="">
            </div>
            <div class="cart-empty-title">
              <h5 class="title">Silahkan Login Terlebih dahulu</h5>
            </div>
            <div class="cart-empty-cta">
              <a href="{{ route('login') }}" class="btn login">Masuk</a>
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