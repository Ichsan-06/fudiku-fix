@extends('template/home')

@section('title','Menu')

@section('main')

@php
    $tab_menu = '';
    $tab_content = '';
    $count = 0;
    $cat = DB::table('category')->get();
    foreach ($cat as $key) {
        if ($count == 0) {
            $tab_menu .= '
            <li class="nav-item">
                <a href="#'.$key->id.'" class="nav-link active" id="home-tab" data-toggle="tab"  role="tab" aria-controls="home" aria-selected="true">'.$key->name.'</a>
            </li>
            ';
            $tab_content .= '
                <div class="tab-pane active" id="'.$key->id.'">
            ';
        }
        else{
            $tab_menu .= '
            <li class="nav-item">
                <a href="#'.$key->id.'" class="nav-link" id="home-tab" data-toggle="tab"  role="tab" aria-controls="home" aria-selected="true">'.$key->name.'</a>
            </li>
            ';
            $tab_content .= '
                <div class="tab-pane" id="'.$key->id.'">
            ';
        }

        $tab = DB::table('sub_category')->where('parentId',$key->id)->get();

        foreach ($tab as $dataTab) {
            $tab_content .= '
                <div class="fudiku-menu-content" style="margin:39px 0px;">
                    <div class="menu-title">
                        <h1>'.$dataTab->name.'</h1>
                        <p>s</p>
                    </div>
                </div>
            ';
        }
        $tab_content .= '</div>';
        $count++;
    }
@endphp


@extends('template/home')

@section('title','Menu')

@section('main')

<div class="fudiku-menu">
    <div class="container-lg">
        <div class="fudiku-search">
            <div class="row">
                <div class="col-md-7">
                    <div class="fudiku-search-location">
                        <form action="" method="POST">
                            <div class="form-field">
                                <i class="icofont-search"></i>
                                <input type="text" class="form-control" placeholder="Medan">
                            </div>
                        </form>
                    </div>
                </div>  
                <div class="col-md-5">
                    <div class="fudiku-category">
                        <ul class="nav">
                            @foreach($categories as $category)
                            <li class="nav-item">
                                <a href="" class="nav-link">{{ $category->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div> 
               </div>
           </div>
        </div>
        @foreach ($sub_category as $sub)
                @php
                // echo $sub->id_sub_category;
                    $product = App\Product::where('id_sub_category',$sub->id)->get();                    
                @endphp
            <div class="fudiku-menu-content" style="margin:40px 0px 40px 0px;">
                <div class="menu-title">
                    <h1>{{ $sub->name }}</h1>
                    <p>{{ $sub->information }}</p>
                </div>
                <div class="menu">
                    @foreach ($product as $products)
                        <div class="menu-item">
                            <div class="menu-img">
                                <img src='{{ asset("img/product/$products->image") }}' alt="">
                            </div>
                            <div class="menu-desc">
                                <span class="date">{{$products->date_delivery->format('D, d-M-Y') }}</span>
                                <p class="menu-name">{{$products->name }}</p>
                            </div>
                        </div>
                    @endforeach
                    {{-- @for($i= 1; $i <= 7; $i++)
                    
                    @endfor      --}}
                </div>
                <div class="menu-ctn">
                    <form action="{{ route('order') }}">
                        <button class="btn btn-light">Langganan</button>
                    </form>
                </div> 
            </div>
        @endforeach 
        {{-- <div class="fudiku-menu-content">
            <div class="menu-title">
                <h1>Padang Lover</h1>
                <p>Menu pilihan khas padang favorite semua</p>
            </div>
            <div class="menu">
                @for($i= 1; $i <= 7; $i++)
                <div class="menu-item">
                    <div class="menu-img">
                        <img src="{{ asset('img/menu/menu1.jpg') }}" alt="">
                    </div>
                    <div class="menu-desc">
                        <span class="date">Senin, 23 November 2020</span>
                        <p class="menu-name">Ayam gulai, Sayur gulai...</p>
                    </div>
                </div>
                @endfor  
                
            </div>
            <div class="menu-ctn">
                <form action="{{ route('order') }}">
                    <button class="btn btn-light">Langganan</button>
                </form>
            </div> 
        </div>  --}}
    </div>
</div>

@endsection


