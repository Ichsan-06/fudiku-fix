@extends('template/home')

@section('title','Fudiku - Cara Baru Pesan Catering')

@section('main')

{{-- <div class="fudiku-search-area">
    <div class="container-lg">
        <div class="row">    
            <div class="col-md-7">
                <div class="fudiku-search">
                    <div class="form-field">    
                        <button class="btn"><i class="icofont-search"></i></button>
                        <input type="text" class="form-control" placeholder="Lokasimu..." value="{{ $location }}" disabled>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="fudiku-category">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="" class="nav-link active">Single Pax</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div> 
</div> --}}

<div class="fudiku-order-area">
    <div class="container-lg">
        <div class="order-content">
            <form action="{{ route('schedule') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="order-menu">
                            <div class="order-menu-title">
                                <h3 class="title">{{ $subCategory->name }}</h3>
                                <span class="subtitle">{{ $subCategory->information }}</span>
                            </div>
                            <div class="order-menu-item owl-carousel owl-theme">
                                @foreach ($product as $products)
                                    <div class="menu-item">
                                        <a href="#" class="updateModal">
                                            <div class="menu-img">
                                                <img class="image" src='{{ asset("img/product/$products->image") }}' alt="">
                                            </div>
                                            <div class="menu-desc">
                                                <span class="date">{{$products->date_delivery->isoFormat('dddd, D MMMM Y') }}</span>
                                                <p class="menu-name">{{$products->name }}</p>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="menu-popup" id="popUpMenu">
                                <div class="modal fade " id="updateModal" tabindex="-1" aria-labelledby="menu-popup" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content menu-popup-content">
                                        <div class="modal-header menu-popup-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="icofont-close"></i></span>
                                            </button>
                                        </div>
                                        <div class="menu-popup-img">
                                            <img src="{{ asset('img/menu/ampela.jpg') }}" alt="" id="img">
                                        </div>
                                        <div class="menu-popup-desc">
                                            <small class="date" id="date"></small>
                                            <p class="info" id="name"></p>
                                        </div>
                                        <!-- <div class="modal-body menu-popup-item">
                                        </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="order-packet">
                            <div class="packet-title">
                                <h3 class="title">Pilih paket anda</h3>
                                {{-- <h2>{{ $location }}</h2> --}}
                            </div>
                            <div class="packet-option">
                                @foreach ($subscription as $data_sub)
                                <div class="packet">
                                    <input type="radio" name="subscription" id="{{ $data_sub->id }}"  value ="{{ $data_sub->id }}">
                                    <label class="label" for="{{ $data_sub->id }}">
                                        <input type="hidden" name="id_subcategory" value="{{ $id_subcategory }}">
                                        <div class="packet-info">
                                            <input type="hidden" name="id_subcategory" value="{{ $id_subcategory }}">
                                            <p class="name">{{ $data_sub->name }}</p>
                                            <span class="day">{{ $data_sub->duration }} Hari </span>
                                        </div>
                                        <div class="packet-price">
                                            @if ($data_sub->discount !== null)
                                                <p class="tax">Hemat {{ $data_sub->discount }}%</p>
                                            @endif
                                            @php
                                                // $discount = $data_su
                                            @endphp
                                            <span class="price">Rp. {{ getPrice($data_sub->price)}}</span>
                                        </div>
                                    </label>
                                 </div>   
                                
                                @endforeach
                            </div>  
                            
                        <!-- @foreach ($subscription as $data_sub)
                            <input type="radio" name="subscription" id="" value="{{ $data_sub->id }}" checked>
                            <input type="hidden" name="id_subcategory" value="{{ $id_subcategory }}">
                            <label>
                                Paket
                            </label>
                        @endforeach -->
                            <!-- <div class="packet-info">
                                <p><strong class="name">{{ $data_sub->name }}</strong></p>
                                <span class="day">{{ $data_sub->duration }} Hari </span>
                            </div>
                            <div class="packet-price">
                                @if ($data_sub->discount !== null)
                                    <p><strong class="tax">Hemat {{ $data_sub->discount }}%</strong></p>
                                @endif
                                @php
                                    // $discount = $data_su
                                @endphp
                                <span class="price">Rp. {{ getPrice($data_sub->price)}}</span>
                            </div> -->
                        </div>
                        <div class="order-cta">
                            <input type="hidden" name="location" value="{{ $location }}">
                            <button type="submit" class="btn next">Atur Tanggal</button>
                        </div>
                    </div>
                </div>
            </form>                
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
         $(document).ready(function(){
            $('.updateModal').click(function(){
                // $('.modal-title').text('Update Data');
                $('#updateModal').modal('show');
                
                var tr = $(this).parent();
                
                console.log();


                // var date = tr.getElementsByClassName('dates');
                // var name = tr.getElementsByClassName('menu-name');


                // var date = $(this).attr('data-date');
                // var name = $(this).attr('menu-name');

                $('#date').text(tr.find(".date").text());
                $('#name').text(tr.find(".menu-name").text());
                $('#img').attr("src",tr.find(".image").attr('src'));
                // console.log(tr)
                
            });  
            
        });
    </script>
@endsection
