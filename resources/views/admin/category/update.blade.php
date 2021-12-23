@extends('template/admin')

@section('title','Admin')

@section('main')

    
    
<div class="update-form-area">
    <h3>Update Kategori</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="POST" action="{{ url('admin/storeCategory') }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            {{-- <input type="hidden" value="{{ @csrf }}"> --}}
                            @csrf
                            <input type="text" value="{{ $tb_kategori->name }}" name="name" class="form-control" placeholder="Enter Name">
                            <input type="hidden" value="{{ $tb_kategori->id }}" name="id">
                            <small id="emailHelp" class="form-text text-muted">silahkan update kategori</small>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-info btn-sm">Update</button>
                        <a class="btn btn-primary btn-sm" href="{{ url('/admin/category') }}">Back</a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection