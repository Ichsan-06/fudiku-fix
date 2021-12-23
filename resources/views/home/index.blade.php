@extends('template.home')

@section('title','Fudiku - Cara Baru Pesan Catering')

@section('main')

<div class="fudiku-home-area">
    <div class="container-lg">
        <div class="home-content owl-carousel owl-theme">
            @for($i = 0; $i < 4; $i++)
            <div class="home-item">
                <div class="row">
                    <div class="col-md-12">
                        <div class="home-img">
                            <img src="{{ asset('img/banner/1.png') }}" class="w-100" alt="">
                        </div>
                    </div>
                    <!-- <div class="col-md-4">
                        <div class="home-text">
                            <h3 class="title">Solusi makan harianmu</h3> 
                            <p class="body-text">Pesan catering untuk makan siang, makan malam, dan event catering enak, higienis, ga pake ribet.</p>
                            <a href="{{ route('location') }}" class="btn">Aku mau pesan!</a>
                        </div>
                    </div> -->
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>

<div class="fudiku-feature-area">
    <div class="container-lg">
        <div class="feature-title">
            <h4 class="title">Kenapa harus pesan di Fudiku?</h4>
        </div>
        <div class="feature-content owl-carousel owl-theme">
            <div class="feature">
                <div class="feature-icon">
                    <i class="flaticon-free-delivery"></i>  
                </div>
                <div class="feature-info">
                    <h6 class="title">Gratis Ongkir</h6>
                    <p class="subtitle">Harga menu sudah <br>termasuk biaya pengiriman</p>
                </div>
            </div>
            <div class="feature">
                <div class="feature-icon">
                    <i class="flaticon-calendar"></i> 
                </div>
                <div class="feature-info">
                    <h6 class="title">Bebas Atur Jadwal</h6>
                    <p class="subtitle">Pilih tanggal kapan <br>pesananmu akan diantar</p>
                </div>
            </div>
            <div class="feature">
                <div class="feature-icon">
                    <i class="flaticon-reception"></i> 
                </div>
                <div class="feature-info">
                    <h6 class="title">Fast Delivery</h6>
                    <p class="subtitle">Makananmu akan tiba <br> pada waktu yang ditentukan</p>
                </div>
            </div>
            <div class="feature">
                <div class="feature-icon">
                    <i class="flaticon-award"></i> 
                </div>
                <div class="feature-info">
                    <h6 class="title">High Quality</h6>
                    <p class="subtitle">Menu telah dikurasi dan <br> melewati quality control</p>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-md-3">
                    <div class="feature">
                        <div class="feature-icon">
                        <i class="flaticon-free-delivery"></i>  
                        </div>
                        <div class="feature-info">
                        <h6 class="title">Gratis Ongkir</h6>
                        <p class="subtitle">Harga menu sudah <br>termasuk biaya pengiriman</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature">
                        <div class="feature-icon">
                            <i class="flaticon-calendar"></i> 
                        </div>
                        <div class="feature-info">
                        <h6 class="title">Bebas Atur Jadwal</h6>
                        <p class="subtitle">Pilih tanggal kapan <br>pesananmu akan diantar</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature">
                        <div class="feature-icon">
                            <i class="flaticon-award"></i> 
                        </div>
                        <div class="feature-info">
                        <h6 class="title">High Quality</h6>
                        <p class="subtitle">Menu telah dikurasi dan <br> melewati quality control</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature">
                        <div class="feature-icon">
                            <i class="flaticon-reception"></i> 
                        </div>
                        <div class="feature-info">
                        <h6 class="title">Fast Delivery</h6>
                        <p class="subtitle">Makananmu akan tiba <br> pada waktu yang ditentukan</p>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>

<div class="fudiku-packet-area">
    <div class="container-lg">
        <div class="packet-title">
            <h4 class="title">Paket terbaik untuk kamu!</h4>
        </div>
        <div class="packet-content owl-carousel owl-theme">
            <div class="packet">
                <a href="{{ route('location') }}">
                    <div class="packet-img">
                        <img src="{{ asset('img/packet/event-catering.jpg') }}" alt="">
                    </div>
                    <div class="packet-category">
                        <h5 class="name">Event Catering</h5>
                        <p class="desc">Nasi kotak, prasmanan, snacks, dan lainnya</p>
                    </div>
                </a>
            </div>
            <div class="packet">
                <a href="{{ route('location') }}">
                    <div class="packet-img">
                        <img src="{{ asset('img/packet/family-pax.jpg') }}" alt="">
                    </div>
                    <div class="packet-category">
                        <h5 class="name">Event Catering</h5>
                        <p class="desc">Nasi kotak, prasmanan, snacks, dan lainnya</p>
                    </div>
                </a>
            </div>
            <div class="packet">
                <a href="{{ route('location') }}">
                    <div class="packet-img">
                        <img src="{{ asset('img/packet/single-pax.jpg') }}" alt="">
                    </div>
                    <div class="packet-category">
                        <h5 class="name">Event Catering</h5>
                        <p class="desc">Nasi kotak, prasmanan, snacks, dan lainnya</p>
                    </div>
                </a>
            </div>
            <div class="packet">
                <a href="{{ route('location') }}">
                    <div class="packet-img">
                        <img src="{{ asset('img/packet/event-catering.jpg') }}" alt="">
                    </div>
                    <div class="packet-category">
                        <h5 class="name">Event Catering</h5>
                        <p class="desc">Nasi kotak, prasmanan, snacks, dan lainnya</p>
                    </div>
                </a>
            </div>
            <div class="row">
                <!-- @foreach($categories as $category) -->
                <!-- <div class="col-md-4">
                    <div class="packet">
                        <div class="packet-img">
                            <img src="{{ asset('img/packet/single-pax.jpg') }}" alt="">
                        </div>
                        <div class="packet-category">
                            <h5 class="name">{{ $category->name }}</h5>
                            <p class="desc">{{ $category->desc }}</p>
                        </div>
                        <div class="packet-cta">
                            <a href="{{ route('location') }}" class="btn btn-packet">Pilih Paket</a>
                        </div>  
                    </div>
                </div> -->
                <!-- @endforeach -->
                <!-- <div class="col-md-4">
                    <div class="packet">
                        <a href="{{ route('location') }}">
                            <div class="packet-img">
                                <img src="{{ asset('img/packet/single-pax.jpg') }}" alt="">
                            </div>
                            <div class="packet-category">
                                <h5 class="name">Single Pax</h5>
                                <p class="desc">Satu porsi lauk, sayur, nasi, dan side dish</p>
                            </div>
                            <div class="packet-cta">
                                <a href="{{ route('location') }}" class="btn btn-packet">Pilih Paket</a>
                            </div>  
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="packet">
                        <a href="{{ route('location') }}">
                            <div class="packet-img">
                                <img src="{{ asset('img/packet/family-pax.jpg') }}" alt="">
                            </div>
                            <div class="packet-category">
                                <h5 class="name">Family Pax</h5>
                                <p class="desc">Lauk dan sayur 3-4 porsi, bisa tambah nasi dan side dish</p>
                            </div>
                            <div class="packet-cta">
                                <a href="{{ route('location') }}" class="btn btn-packet">Pilih Paket</a>
                            </div>  
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="packet">
                        <a href="{{ route('location') }}">
                            <div class="packet-img">
                                <img src="{{ asset('img/packet/event-catering.jpg') }}" alt="">
                            </div>
                            <div class="packet-category">
                                <h5 class="name">Event Catering</h5>
                                <p class="desc">Nasi kotak, prasmanan, snacks, dan lainnya</p>
                            </div>
                            <div class="packet-cta">
                                <a href="{{ route('location') }}" class="btn btn-packet">Pilih Paket</a>
                            </div>  
                        </a>
                    </div>
                </div> -->
            </div>    
        </div>

    </div>
</div>
<div class="fudiku-cta-area">
    <div class="container-lg">
        <div class="cta-content">
            <div class="cta-title">
                <h6 class="title">Pertama di Medan</h6>
                <h5 class="subtitle"> Siap merasakan menu berkualitas dan bebas ribet?</h5>
            </div>
            <a href="{{ route('location') }}" class="btn">Pesan Sekarang</a> 
        </div>
    </div>
</div>

<div class="fudiku-supported-area">
    <div class="container-lg">
        <div class="supported-title">
            <h4 class="title">Supported By</h4>
        </div>
        <div class="supported-content owl-carousel owl-theme">
            <div class="supported">
                <div class="supported-img"> 
                    <img src="{{ asset('img/supported/umsu.png') }}" alt="">
                </div>
            </div>
            <div class="supported">
                <div class="supported-img">
                    <img src="{{ asset('img/supported/1000.png') }}" alt="">
                </div>
            </div>
            <div class="supported">
                <div class="supported-img">
                    <img src="{{ asset('img/supported/umsu.png') }}" alt="">
                </div>
            </div>
            <div class="supported">
                <div class="supported-img">
                    <img src="{{ asset('img/supported/1000.png') }}" alt="">
                </div>
            </div>
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

@endsection
