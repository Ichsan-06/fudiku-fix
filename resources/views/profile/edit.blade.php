@extends('template.home')

@section('title','Edit Profile')

@section('main')

<div class="fudiku-profile-edit-area">
    <div class="container-lg">
        <div class="profile-edit-content">
            <form action="" class="profile-edit-form">
                <div class="profile-edit-img">
                    <!-- <img src="" alt=""> -->
                    <div class="dropzone">
                        <div class="fallback">
                            <input type="file">
                        </div>
                    </div>
                    <!-- <label for="upload"><i class="icofont-camera"></i></label> -->
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Email">
                </div>
                <button class="btn">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection