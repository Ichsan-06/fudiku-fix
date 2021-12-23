@extends('template/admin')

@section('title','Admin - Edit Transfer')

@section('main')

@section('main-heading')
    <div class="breadcrumb-area">
        <div class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Edit Transfer</li>
        </div>
    </div>
@endsection  
    
<div class="update-form-area">
    <form action="{{ url('admin/postUpdateTransfer') }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" id='id' value="{{ $transfer->id }}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" id='name' class="form-control" placeholder=""  value="{{ $transfer->name }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nomor Rekening</label>
            <input type="text" name="no_rekening" id="no_rekening" class="form-control" placeholder="" value="{{ $transfer->no_rekening }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Atas Nama</label>
            <input type="text" name="name_rekening" id="atas_nama" class="form-control" placeholder="" value="{{ $transfer->name_rekening }}">
        </div>
        <div class="form-group">
            <label >Logo</label><br>
            <input type="file" name="logo" id="logo" class="form-control">
            <small>*isi jika mau diupdate</small>
        </div>
        <!-- <div class="modal-body">
            
        </div>
        
        <div class="modal-footer">
            <a href="{{ url('admin/transfer') }}"  class="btn btn-danger" data-dismiss="modal">Kembali</a>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div> -->
    </form>
</div>



@endsection