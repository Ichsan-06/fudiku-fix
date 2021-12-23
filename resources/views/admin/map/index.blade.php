@extends('template/admin')

@section('title','Admin')

@section('main')


@section('main-heading')

    <div class="breadcrumb-area">
        <div class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Map</li>
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
                    <th scope="col">#</th>
                    <th scope="col">Kabupaten</th>
                    <th scope="col">Kecamatan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $datas)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td scope="row">{{$datas->kabupaten }}</td>
                        <td scope="row">{{$datas->kecamatan }}</td>
                        <td>    
                            <a href='{{ url("admin/deleteMap/$datas->id") }}' class="btn btn-danger btn-sm">Delete</a>
                            <button class="btn updateBtn btn-sm btn-info" data-id="{{ $datas->id }}" data-name='{{$datas->kabupaten }}'>Update</button>
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
          <h5 class="modal-title" id="exampleModalLabel">Tambah Lokasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('tambahMap') }}" method="post">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" name="kabupaten" class="form-control" placeholder="Kabupaten">
                </div>
                <div class="form-group">
                    <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan">
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
            <form id="editFormMap" method="POST">
                <input type="hidden" name="id" id='id'>
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="kabupaten" id="kabupaten" class="form-control" placeholder="Kabupaten">
                    </div>
                    <div class="form-group">
                        <input type="text" name="kecamatan" id="kecamatan" class="form-control" placeholder="Kecamatan">
                    </div>                    
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
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
                // var dataName = $(this).attr('data-name');


                $('#kabupaten').val(data[0]);
                $('#kecamatan').val(data[1]);
                $('#id').val(dataId);

            });  
        });
        
        $('#editFormMap').on('submit',function(e){
            e.preventDefault();
            var id = $('#id').val();

            $.ajax({
                type:'POST',
                url : '/admin/updateMap/'+id,
                data:$('#editFormMap').serialize(),
                success:function(response){
                    // console.log(response);
                    $('#updateModal').modal('hide');
                    window.location.reload();
                },
                error:function(error){
                    console.log(error);
                } 
            });
        })
    </script>
@endsection