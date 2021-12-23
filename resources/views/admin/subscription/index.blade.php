@extends('template/admin')

@section('title','Admin')

@section('main')

@section('main-heading')
    <div class="breadcrumb-area">
        <div class="breadcrumb">
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Subscription</li>
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
    </div>
    <div class="table-body">
        <table class="table table-hover table-striped table-responsive">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tb_subscription as $data)
                    <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->duration }} Hari</td>
                        <td>Rp.{{ $data->price }}</td>
                        <td>{{ $data->discount }}%</td>
                        
                        <td>
                        <a href='{{ url("admin/deleteSubscription/$data->id") }}' class="btn btn-danger btn-sm">Delete</a>
                        <a href='{{ url("admin/updateSubscription/$data->id") }}' class="btn btn-info btn-sm">Update</a>
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
            <h5 class="modal-title" id="exampleModalLabel">Tambah Subcription</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{ route('tambahSubscription') }}" method="post">
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    {{-- <input type="hidden" value="{{ @csrf }}"> --}}
                    <input type="text" name="name" class="form-control" placeholder="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Duration</label>
                    <input type="number" name="duration" id="duratio" min="1" class='form-control'>
                    <small>*dalam hitungan hari</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="number" name="price" id="price" class="form-control" min="1">
                    <small>*masukan angka saja</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">discount</label>
                    <input type="number" name="discount" id="price" class="form-control" min="1">
                    <small>*masukan hitungan persen</small>
                </div>

                <select name="category" class="form-control">
                    @foreach ($tb_category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>



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


           $('#name').val(data[0]);
           $('#keterangan').val(data[1]);
            $('#id').val(dataId);
            // console.log(dataId);
        });  
        $('#editFormKategori').on('submit',function(e){
            e.preventDefault();
            var id = $('#id').val();

            $.ajax({
                type:'POST',
                url : '/admin/updateSubCategory/'+id,
                data:$('#editFormKategori').serialize(),
                success:function(response){
                    console.log(response);
                    $('#updateModal').modal('hide');
                    console.log(name)
                    window.location.reload();
                },
                error:function(error){
                    console.log(error);
                } 
            });
        })

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
                url : '/admin/changeSubIsActive/'+dataId,
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
            // console.log(isChecked);
        })
    })
</script>
@endsection