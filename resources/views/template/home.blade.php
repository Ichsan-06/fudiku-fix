<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') </title>
    <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/animate.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/dropzone.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/icofont.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/flaticon.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/owl.carousel.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/owl.theme.default.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/places.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/nice-select.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/datepicker.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home.css') }} ">
</head>
<body>
<header class="header-web">
  <nav class="navbar navbar-expand-lg">
    <div class="container-lg">
      <div class="navbar-logo">
        <a href="{{ route('home') }}" class="navbar-brand"><img src="{{ asset('img/logo/fudiku.png') }}" alt=""></a>
      </div>
      <button class="btn navbar-toggler" type="button" data-toggle="collapse" data-target="#web-collapse" aria-controls="web-collapse" aria-expanded="false" aria-label="">
          <i class="icofont-navigation-menu"></i>
      </button>
      <div class="collapse navbar-collapse" id="web-collapse">
        <ul class="navbar-nav ml-auto">
            @guest
                <!-- <form action="{{ route('login') }}" class="form-inline">
                  <button class="btn login bg-light">{{ __('Masuk') }}</button>
                </form> -->
                <a href="{{ route('login') }}" class="btn login">{{ __('Masuk') }}</a> 
                @if (Route::has('register'))
                  <!-- <form action="{{ route('register') }}" class="form-inline">
                    <button class="btn login bg-primary">{{ __('Daftar') }}</button>
                  </form> -->
                  <a href="{{ route('register') }}" class="btn register ">{{ __('Daftar') }}</a> 
                @endif
            @else
                <li class="nav-item dropdown">
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="user">
                        <!-- <a class="dropdown-item" href="#" >
                            {{ Auth::user()->email }}
                        </a> -->
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                  @php
                      $idUser = Auth::user()->id;
                      $tablePayment = DB::table('payment')->where('id_user',$idUser)->count();
                  @endphp
                  <a href="{{ url('cart') }}" class="nav-link cart" data-target=""><i class="flaticon-shopping-bag"></i> <span class="badge badge-danger qty">{{ $tablePayment }}</span></a>
              </li>
            @endguest
            
        </ul>
      </div>
    </div>		
  </nav>
</header>

<div class="mobile-top-nav">
  <navbar class="navbar navbar-expand-lg ">
    <div class="container-lg">
      <div class="navbar-logo">
        <a href="{{ route('home') }}" class="navbar-brand"><img src="{{ asset('img/logo/fudiku.png') }}" alt=""></a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile-collapse" aria-controls="web-collapse" aria-expanded="false" aria-label="">
          <i class="icofont-navigation-menu"></i>
      </button>
      <div class="collapse navbar-collapse" id="mobile-collapse" >
        <ul class="navbar-nav ml-auto">
          <!-- <li class="nav-item">
            <a href="{{ route('about') }}" class="nav-link" data-target="">About</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('contact') }}" class="nav-link" data-target="">Contact</a>
          </li> -->
          @guest
                <a href="{{ route('login') }}" class="btn login ">{{ __('Masuk') }}</a> 
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn register ">{{ __('Daftar') }}</a> 
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
          
              
        </ul>
      </div>
    </div>		
  </navbar>
</div>

<main class="main-content">
    @yield('main')
    
</main>



<footer class="footer-web">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-4">
              <div class="footer-about">
                <h4 class="title">Tentang</h4>
                <div class="about-info">
                  <span class="body-text"> Fudiku adalah layanan catering online berlangganan yang memberdayakan dapur UMKM rumahan sebagai kitchen-partner. Dimasak dengan sepenuh hati dan cinta.</span>
                </div>
                <div class="social-media">
                  <div class="icon">
                      <a href=""><i class="icofont-whatsapp"></i></a>
                  </div>
                  <div class="icon">
                    <a href=""><i class="icofont-facebook"></i></a>
                  </div>
                  <div class="icon">
                    <a href=""><i class="icofont-instagram"></i></a>
                  </div>
                  <div class="icon">
                    <a href=""><i class="icofont-twitter"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="footer-location">
                  <h4 class="title">Lokasi</h4>
                  <div class="location-info">
                    <span class="body-text">Fudiku Office Center, Universitas Muhammadiyah Sumatra Utara, 
                      Jl. Kapten Muchtar Basri No.3, Glugur Darat II, Kec. Medan Tim., Kota Medan, Sumatera Utara 20238</span>
                  </div>
                  
              </div>

            </div>
          
            <div class="col-md-4">
              <div class="footer-payment">
                  <h4 class="title">Pembayaran</h4>
                  <div class="payment-item">
                    <div class="payment">
                      <div class="payment-img">
                        <img src="{{ asset('img/payment/bca.png') }}" alt="">
                      </div>
                    </div>
                    <div class="payment">
                      <div class="payment-img">
                        <img src="{{ asset('img/payment/ovo.png') }}" alt="">
                      </div>
                    </div>
                    <!-- <div class="payment">
                      <div class="payment-img">
                        <img src="{{ asset('img/logo/payment/cod.png') }}" alt="">
                      </div>
                    </div> -->
                  </div>
              </div>

            </div>
            
        </div>
    </div>
</footer>
<script type="text/javascript" src="{{ asset('/js/jquery-3.4.1.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/owl.carousel.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/datepicker.en.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/dropzone.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/jquery.nice-select.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/home.js') }}"></script>
@yield('script')
</body>
</html>	
