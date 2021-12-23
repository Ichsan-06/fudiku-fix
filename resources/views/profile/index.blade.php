@extends('template.home')

@section('title','Profile')

@section('main')


<div class="fudiku-profile-area">
    <div class="container-lg">
        <div class="profile-content">
            <div class="profile">
                <div class="profile-img">
                    <img src="{{ asset('img/profile/') }}" alt="">
                </div>
                <div class="profile-info">
                    <h5 class="name">{{ Auth::user()->username }}</h5>
                </div>
                <div class="profile-edit">
                    <form action="{{ route('profile.edit') }}">
                        <button class="btn">Edit Profile</button>
                    </form>
                </div>
                
            </div>
            <div class="profile-detail-info">
                {{-- <div class="detail-info">
                    <h6 class="info-heading">Alamat</h6>
                    <small>Jln. Benteng Hilir, Perumahan Benhil 2, Block C No.2</small>
                </div> --}}
                {{-- <div class="detail-info">
                    <h6 class="info-heading">Nomor Telepon</h6>
                    <small>{{ Auth::user()->username }}</small>
                </div> --}}
                <div class="detail-info">
                    <h6 class="info-heading">Email</h6>
                    <small>{{ Auth::user()->email }}</small>
                </div>
                <div class="detail-info">
                    <h6 class="info-heading">Menu Favorit</h6>
                    <small>Chicken Club</small>
                </div>
                
            </div>
            <div class="profile-cta">
                @guest
                <a href="{{ route('login') }}" class="btn login ">{{ __('Masuk') }}</a> 
                    @if (Route::has('register'))
                        <a href="{{ route('login') }}" class="btn login ">{{ __('Daftar') }}</a> 
                    @endif

                    @else
                        <a class="btn login" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                
                
                @endguest
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