@extends('template/admin')

@section('title','Admin')

@section('main')

@section('main-heading')

    <div class="breadcrumb-area">
        <div class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Customer</li>
        </div>
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
                    <th scope="col">Name</th>
                    <th scope="col"></th>
                    <th scope="col" width='30%'>Thumbnail</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($tb_product as $data)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td scope="row">{{ $data->name_product }}</td>                                    
                        <td scope="row">{{$data->date_delivery->format('d-m-Y') }}</td>                                    
                        <td width='30%'><img src='{{ url("img/product/$data->image") }}' alt="{{ $data->image }}" width="30%"></td>                                    
                        <td scope="row">{{ $data->name }}</td>                                    
                        <td scope="row">
                        <a href='{{ url("admin/deleteProduct/$data->id") }}' class="btn btn-danger btn-sm">Delete</a>
                        <a href='{{ url("admin/updateProduct/$data->id") }}' class="btn btn-info btn-sm">Update</a>
                        </td>
                    </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
</div>

@endsection