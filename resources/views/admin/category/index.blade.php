@extends('template/admin')

@section('title','Admin')

@section('main')

@section('main-heading')

    <div class="breadcrumb-area">
        <div class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Category</li>
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
        <table class="table table-hover table-striped table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col" width="30%">Description</th>
                    <th scope="col">Is Active</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $data)
                    <tr>
                        <td scope="row">{{ $loop->index + 1 }}</td>
                        <td scope="row">{{ $data->name }}</td>                                    
                        <td scope="row">{{ $data->slug }}</td>                                    
                        <td scope="row" width="30%">{{ $data->desc }}</td>                                    
                        <form>
                            @csrf
                            <td><input type="checkbox" class='checked' data-id="{{ $data->id }}"  @if ($data->isActive == 1)
                                {{ 'checked' }}
                            @endif></td>
                        </form>
                        <td>
                        <a href='{{ url("admin/deleteCategory/$data->id") }}' class="btn btn-danger btn-sm">Delete</a>
                        {{-- <a href='{{ url("admin/updateCategory/$data->id") }}' class="btn btn-info btn-sm">Update</a> --}}
                        <button class="btn updateBtn btn-sm btn-info" data-id="{{ $data->id }}">Update</button>
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
        <form action="{{ route('tambahCategory') }}" method="post">
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Kategori">
                </div>
                <div class="form-group">
                    <input type="text" name="slug" class="form-control" placeholder="Slug">
                </div>
                <div class="form-group">
                    <input type="text" name="desc" class="form-control" placeholder="Description">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="updateModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editFormKategori" method="POST">
                <input type="hidden" name="id" id='id'>
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form-control" placeholder="Kategori">
                    </div>
                    <div class="form-group">
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug">
                    </div>
                    <div class="form-group">
                        <input type="text" name="desc" id="desc" class="form-control" placeholder="Description">
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection


@section('script')
    <script>
        $(document).ready(function(){
            $('.updateBtn').click(function(){
                $('.modal-title').text('Update Data')
                $('#updateModal').modal('show');
                
                $tr = $(this).closest('tr');

                var data = $tr.children('td').map(function(){
                    return $(this).text();
                }).get();

                var dataId = $(this).attr('data-id');


                $('#name').val(data[1]);
                $('#slug').val(data[2]);
                $('#desc').val(data[3]);
                $('#id').val(dataId);
                
            });  
            

            $('.checked').on('change',function(e){
                var dataId = $(this).attr('data-id');
                // console.log(dataId);
                if ($(this).is(":checked"))
                {
                    var isChecked =  1;
                }
                else{
                    var isChecked =  0;
                }
                e.preventDefault();
                $.ajax({
                    type:'POST',
                    url : '/admin/changeIsActive/'+dataId,
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                    data:{ "value" : isChecked },
                    success:function(response){
                        // console.log(response);
                        alert('data berhasil diubah')
                    },
                    error:function(error){
                        alert('data gagal diubah')
                    } 
                });
            })
        });
        
        $('#editFormKategori').on('submit',function(e){
            e.preventDefault();
            var id = $('#id').val();

            $.ajax({
                type:'POST',
                url : '/admin/updateCategory/'+id,
                data:$('#editFormKategori').serialize(),
                success:function(response){
                    console.log(response);
                    $('#updateModal').modal('hide');
                    window.location.reload();
                },
                error:function(error){
                    console.id(id)
                } 
            });
        })
    </script>
@endsection