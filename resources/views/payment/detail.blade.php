@extends('template.home')

@section('title','Payment Detail')

@section('main')

<div class="fudiku-payment-detail-area">
    <div class="container-lg">
        <div class="detail-content">
            <div class="row">
                <div class="col-md-12">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }}
                        @endforeach
                            
                        </div>
                    @endif
                </div>
                <div class="col-md-4">
                    <div class="detail-information">
                        <div class="detail-info">
                            <h6 class="info-head"><strong>Batas Akhir Pembayaran</strong></h6>
                            @php
                                use carbon\carbon;
                                $tgl = $table->created_at;
                                $date = Carbon::parse("$tgl")->addHour(24);
                            @endphp
                            <small>{{ date('j F, Y',strtotime($date) ) }}</small>
                        </div>
                        <div class="detail-info">
                            <h6><strong>Tranfer Via</strong></h6>
                            
                            <img src="{{ asset("img/payment/$table->image") }}" width="80" alt="">
                        </div>
                        <div class="detail-info">
                            <h6 class="info-head"><strong>Nomor Rekening</strong></h6>
                            <small>{{ $table->no_rekening }}</small>
                            <small>A/N {{ $table->name_rekening }}</small>
                        </div>
                        <div class="total-info">
                            <p class="info-head"><strong>Total Pembayaran</strong></p>
                            <small>Rp. {{ getPrice($db_order->price) }}</small>
                        </div>
                        <a href="{{ url("payment/update/$code") }}" class="btn btn-update">Ubah Metode</a>
                        
                    </div>
                    
                    
                </div>
                <div class="col-md-8">
                    <form action="{{ route('postDetailPayment') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="code" value="{{ $db_order->code_order }}">
                        <div class="detail-form">
                            <div class="detail-title">
                                <h6><strong>Konfirmasi Pembayaran</strong></h6>
                            </div>
                            <div class="form-group">
                                <label for=""><small>Nomor Rekening</small></label>
                                <input type="number" min="0" class="form-control" name="no_rekening" required>
                                </div>
                                <div class="form-group">
                                    <label for=""><small>Atas Nama</small></label>
                                    <input type="text" class="form-control" name="name_rekening" required>
                            </div>
                            <div class="">
                                <label for=""><small>Upload Bukti Pembayaran</small></label>
                                <input type="file" class=""  name="image">
                            </div>
                        </div>
                        <div class="detail-cta">
                            
                            <input type="hidden" name="code" value="{{ $code }}">
                            {{-- <input type="hidden" name="name" value="{{ $code }}"> --}}
                            <input type="hidden" name="email" value="{{ $db_order->email }}">
                            <button type="submit" class="btn next">Konfirmasi Pembayaran</button>
                         </div> 
                    </form>
                </div>
            </div>
            
        </div>
        
        
    </div>
</div>

@endsection