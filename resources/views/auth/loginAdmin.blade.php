@extends('template.login')

@section('content')
<div class="fudiku-login-admin">
    <div class="form-login">
        <div class="form-logo">
            <img src="{{ asset('img/logo/fudiku.png') }}" alt="" width="120">
        </div>
        @if (session('status'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>  {{ session('status') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form action="{{ route('postAdmin') }}" method="post" class="">
            @csrf
            <div class="form-group">
            <!-- <label for="">Username</label> -->
                <input type="text" class="form-control" placeholder="Email" name="username">
                @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>
            <div class="form-group">
            <!-- <label for="">Password</label> -->
                <input type="password" placeholder="Password" class="form-control" name="password">
            </div>
            <button class="btn btn-block btn-login">Login</button>
            
        </form>
    </div>
</div>
@endsection
