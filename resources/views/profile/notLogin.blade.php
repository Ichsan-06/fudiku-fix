@extends('template.home')

@section('title','Profile')

@section('main')


<div class="fudiku-profile-blank-area">
    <div class="container-lg">
        <div class="profile-blank-content">
            <div class="profile-blank-img">
              <img src="{{ asset('img/vector/profile.png') }}" alt="">
            </div>
            <div class="profile-blank-title">
              <h5 class="title">Silahkan Login Terlebih dahulu</h5>
            </div>
            <div class="profile-blank-cta">
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