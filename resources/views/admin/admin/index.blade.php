@extends('template/admin')

@section('title','Admin')

@section('main')

@section('main-heading')
    <div class="breadcrumb-area">
        <div class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Admin</li>
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
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Roles</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $data)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td scope="row">{{ $data->username }}</td>                                    
                        <td scope="row">{{$data->email }}</td>
                        <td scope="row">{{($data->hasrole('admin') == 1) ? 'Admin' : '' }}</td>
                        <td>    
                            <a href='{{ url("admin/deleteProduct/$data->id") }}' class="btn btn-danger btn-sm">Delete</a>
                            <a href='{{ url("admin/updateProduct/$data->id") }}' class="btn btn-info btn-sm">Update</a>
                            <a href='{{ url("admin/updateProduct/$data->id") }}' class="btn btn-success btn-sm">See Profile</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection