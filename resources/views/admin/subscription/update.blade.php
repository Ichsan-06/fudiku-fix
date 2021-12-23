@extends('template/admin')

@section('title','Admin')

@section('main')

@section('main-heading')
    <div class="breadcrumb-area">
        <div class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Edit Subscription</li>
        </div>
    </div>

@endsection  
    
<div class="update-form-area">
<form method="POST" action="{{ url('admin/storeSubscription') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $tb_subscription->id }}">
        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            {{-- <input type="hidden" value="{{ @csrf }}"> --}}
            <input type="text" name="name" class="form-control" value="{{ $tb_subscription->name }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Duration</label>
            <input type="text" name="duration" id="duratio" min="1" class='form-control' value="{{ $tb_subscription->duration }}">
            <small>*dalam hitungan hari</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Price</label>
            <input type="number" name="price" id="price" class="form-control" min="1" value="{{ $tb_subscription->price }}">
            <small>*masukan angka saja</small>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">discount</label>
            <input type="number" name="discount" id="price" class="form-control" min="1" value="{{ $tb_subscription->discount }}">
            <small>*masukan hitungan persen</small>
        </div>
        <div class="form-group">
            <select name="category" class="form-control">
                @foreach ($tb_category as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-info">Update</button>
            <a class="btn btn-primary" href="{{ url('/admin/subcription') }}">Back</a>
        </div>
    </form>
</div>



@endsection