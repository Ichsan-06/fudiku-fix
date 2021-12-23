@extends('template/admin')

@section('title','Admin')

@section('main')

@section('main-heading')

<div class="breadcrumb-area">
    <div class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">Product</li>
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
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                    <th with="10%" scope="col">#</th>
                    <th width="25%" scope="col">Name</th>
                    <th width="15%" scope="col">Date Delivery</th>
                    <th width="15%" scope="col" >Thumbnail</th>
                    <th width="15%" scope="col">Category</th>
                    <th width="20%" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tb_product as $data)
                    <tr>
                        <th with="10%" scope="row">{{ $loop->index + 1 }}</th>
                        <td width="25%" scope="row">{{ $data->name_product }}</td>                                    
                        <td width="15%" scope="row">{{$data->date_delivery->format('d-m-Y') }}</td>                                    
                        <td width='15%'><img src='{{ url("img/product/$data->image") }}' alt="{{ $data->image }}" width="80" height="80php a"></td>                                    
                        <td width="15%" scope="row">{{ $data->name }}</td>                                    
                        <td width="20%" scope="row">
                        <a href='{{ url("admin/deleteProduct/$data->id") }}' class="btn btn-danger btn-sm">Delete</a>
                        <a href='{{ url("admin/updateProduct/$data->id") }}' class="btn btn-info btn-sm">Update</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('insertProduct') }}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    @csrf
                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{old('name')}}" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Date Delivery</label>
                    <input type="date" name="date_delivery" class="form-control" id="date_delivery" value="{{old('date_delivery')}}" placeholder="Enter date delivery" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    @php
                    $table = DB::table('sub_category')
                                    ->where('isActive','1')
                                    ->get();
                    @endphp
                    <select name="category" id="category" class="form-control w-100 select" required>
                        @foreach ($table as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Image</label>                        
                    <input type="file" name="image" class="form-control" id="image" placeholder="image" >
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
        </div>
    </div>
</div>




@endsection