@extends('template.home')

@section('title','Fudiku - Cara Baru Pesan Catering')

@section('main')


<div class="fudiku-form-area">
    <div class="container-lg">
        <div class="form-title">
            <h5 class="title">Lengkapi data dibawah ini</h5>
            <small class="subtitle">Isi form berikut untuk melanjutkan ke pembayaran</small>
        </div>
        <div class="form-content">
            <div class="form-area">
                <form action="{{ route('postForm') }}" method="post" class="form">
                    @csrf
                    <input type="hidden" name="id_subcategory" value="{{ $id_subcategory }}">
                    <input type="hidden" name="id_subscription" value="{{ $id_subscription }}">
                    <input type="hidden" name="date_delivery" value="{{ $date_delivery }}">
                    <div class="form-group">
                        <!-- <label for="">Nama Lengkap</label> -->
                        <input type="text" class="form-control" placeholder="Nama Lengkap"  name="full_name" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" min="0" placeholder="Nomor WhatsApp" name="phone" id="" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <!-- <label for="">Email</label> -->
                        <input type="email" class="form-control"  placeholder="Email" name="email" autocomplete="off" required value="{{ $email }}" <?php if ($email != null) echo "" ?>>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <!-- <option value="">Kabupaten</option> -->
                            <select class="form-control city disabled" name="kabupaten" id="kabupaten" placeholder="Kabupaten" required>
                                <!-- <option value="">Pilih Kabupaten</option> -->
                                @foreach ($table_map as $kabupaten)
                                    <option value="{{ $kabupaten->kabupaten }}" <?php if ($location == $kabupaten->kabupaten)echo  "selected" ?>>{{ $kabupaten->kabupaten }}</option>
                                @endforeach
                                </select>
                        </div>
                        <div class="form-group col-md-6">
                            <select class="form-control kecamatan disabled" name="kecamatan" id="kecamatan" required>
                                {{-- <option value="">Kecamatan</option> --}}
                                <option value="{{ $kecamatan }}">{{ $kecamatan }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- <label for="">Alamat</label> -->
                        <textarea name="address" class="form-control" id="" cols="30" rows="10" placeholder="Alamat" autocomplete="off" required></textarea>
                    </div>
                    {{-- <p id="kecamatan"></p> --}}
                    <button class="btn next">Lanjutkan</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#kabupaten').on('change',function () {
                var kabupaten = $(this).val();
                $.ajax({
                    url: "/formLocation",
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    type : 'POST',
                    data:{
                        kabupaten : kabupaten
                    },
                    success:function(respond) {
                        $('.kecamatan').html(respond);
                        console.log(respond);
                    },
                    error:function(){
                        alert('Gagal');
                    }
                })
            })
            
        })

    </script>
@endsection