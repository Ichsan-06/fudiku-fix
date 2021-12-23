@extends('template.home')

@section('title','Fudiku - Cara Baru Pesan Catering')   

@section('main')

<div class="fudiku-location-area">
    <div class="location-content">
        <div class="location-form"> 
            <form action="{{ route('postLocation') }}" class="form" method="POST">
                @csrf
                <div class="location-title">
                    <h4 class="title">Pilih Lokasimu</h4>
                </div>
                <div class="form-field">
                    <input type="text" id="location" required list="list-city" autocomplete="off" name="location" tabindex="1" class="location form-control" placeholder="Cari Kabupaten Kamu">
                    <button type="submit" class="btn"><i class="icofont-search"></i></button>
                    {{-- <datalist id="list-city">
                        @foreach ($city as $data)
                            <option value="{{ $data->location }}"></option>
                        @endforeach
                    </datalist>  --}}
                    
                    <div class="location-search-area"></div>
                </div>
            </form>
        </div>
        <div class="location-img-area">
            <div class="location-img">
                <img src="{{ asset('img/vector/map.png') }}" alt="">
            </div>
        </div>
    </div>
    
    
</div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.location').keyup(function() {
                var query = $(this).val();

                if (query !== null) {
                    $.ajax({
                        url:'/searchLocation',
                        method:'POST',
                        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                        data:{query:query},
                        success:function(data){
                            $('.location-search-area').fadeIn();
                            $('.location-search-area').html(data);
                        }
                    })
                }
                else{
                    $('.location-search-area').fadeOut();
                }
    
            })
            $(document).on('click','a',function() {
                $('.location-search-area').fadeOut();
                $('.location').val($(this).text());
            })
        })
    </script>

@endsection