@extends('template/admin')

@section('title','Admin')

@section('main')

    
    
    <div class="container">
        <h3>Update Sub Kategori</h3>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="POST" action="{{ url('admin/storeSubKategori') }}">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                {{-- <input type="hidden" value="{{ @csrf }}"> --}}
                                @csrf
                                <input type="text" value="{{ $tb_subkategori->name }}" name="name" class="form-control" placeholder="Enter Name">
                                <input type="hidden" value="{{ $tb_subkategori->id }}" name="id">
                                <small id="emailHelp" class="form-text text-muted">silahkan update kategori</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kategori</label>
                                {{-- <input type="hidden" value="{{ @csrf }}"> --}}
                                @csrf
                                    @php
                                        $table = DB::table('kategori')->get();
                                    @endphp
                                <select name="kategori" id="" class="form-control">
                                    <option value="{{ $parentId->id }}"  hidden>{{ $parentId->name }}</option>
                                    @foreach ($table as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <small id="emailHelp" class="form-text text-muted">silahkan tambah kategori</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Keterangan</label>
                                <textarea name="deskripsi" class="form-control">{{ $tb_subkategori->keterangan }}</textarea>
                                <small id="emailHelp" class="form-text text-muted">silahkan masukan keterangan</small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-info btn-sm">Update</button>
                            <a class="btn btn-primary btn-sm" href="{{ url('/admin/subkategori') }}">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection