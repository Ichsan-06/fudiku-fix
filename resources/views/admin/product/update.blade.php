@extends('template/admin')

@section('title','Admin')

@section('main')

@section('main-heading')

<div class="breadcrumb">
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Edit Product</li>
</div>

@endsection      
    
<div class="update-form-area">
    <form method="POST" action="{{ url('admin/storeUpdateProduct') }}" enctype="multipart/form-data">
        <div class="form-group">
            <input type="hidden" name="id" value="{{ $tbl_product->id }}">
            <label for="exampleInputEmail1">Name</label>
            @csrf
            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{old('name',$tbl_product->name_product)}}" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Date Delivery</label>
            <input type="date" name="date_delivery" class="form-control" id="date_delivery" value="{{old('date_delivery',$tbl_product->date_delivery->format('Y-m-d'))}}" placeholder="Enter date delivery" required>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Image</label>                        
            <input type="file" name="image" class="form-control" id="image" placeholder="image" >
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Category</label>
            @php
                $table = DB::table('sub_category')
                            ->where('isActive','1')
                            ->get();
            @endphp
            <select name="category" id="category" class="form-control" required>
                <option hidden value="{{ $tbl_product->id_sub_category }}">{{ $tbl_product->name }}</option>
                @foreach ($table as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
            <button class="btn btn-info btn-sm">Update</button>
        <a class="btn btn-primary btn-sm" href="{{ url('/admin/product') }}">Back</a>
    </form>
</div>



@endsection