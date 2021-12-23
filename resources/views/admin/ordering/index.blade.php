@extends('template/admin')

@section('title','Admin')

@section('main')

    
@section('main-heading')

    <div class="breadcrumb-area">
        <div class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Ordering</li>
        </div>

    </div>
    <div class="add-area ml-auto">
        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#exampleModal">
            Tambah Data
        </a>
    </div>

@endsection     
<div class="table-area">
    <div class="table-header">
        
    </div>
    <div class="table-body">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <table class="table table-hover table-striped table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal Antar</th>
                    <th scope="col">Nama Paket</th>
                    <th scope="col">Hari Ini</th>
                    <th scope="col">Nama Pelanggan</th>
                    {{-- <th scope="col">Alamat</th> --}}
                    <th scope="col">Alamat</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $datas)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td scope="row">{{$datas->date_delivery }}</td>
                        <td scope="row">{{$datas->subsName }}</td>
                        <td scope="row">{{ (date("Y-m-d", strtotime($datas->date_delivery))  == date('Y-m-d')) ? 'YES' : 'no' }}</td>
                        <td scope="row">{{$datas->full_name }}</td>
                        <td scope="row">{{$datas->alamat_lengkap }}</td>
                        <td>    
                            {{-- <a href='{{ url("admin/deleteMap/$datas->id") }}' class="btn btn-danger btn-sm">Delete</a>
                            <button class="btn updateBtn btn-sm btn-info" data-id="{{ $datas->id }}" data-name='{{$datas->kabupaten }}'>Update</button> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection