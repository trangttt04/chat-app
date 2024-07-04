@extends('layouts.app')
@section('title')
    Đăng kí
@endsection
@section('content')
    <div class="form-wrapper">

        <!-- logo -->
        <div class="logo my-5">
            <img src="{{asset('assets/media/img/logo-full-2x.png')}}" alt="logo">
        </div>
        <!-- ./ logo -->

        <h5>Tạo tài khoản</h5>

        <!-- form -->
        <form action="{{route('register')}}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control mb-0" placeholder="Họ" value="{{old('first_name')}}" name="first_name" autofocus>
                @error('first_name')
                <p class="text-danger text-start ps-2 fw-bold">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control mb-0" placeholder="Tên" {{old('last_name')}} name="last_name">
                @error('last_name')
                <p class="text-danger text-start ps-2 fw-bold">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <input type="text" class="form-control mb-0" placeholder="Email" {{old('email')}} name="email">
                @error('email')
                <p class="text-danger text-start ps-2 fw-bold">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control mb-0" placeholder="Mật khẩu" {{old('password')}} name="password">
                @error('password')
                <p class="text-danger text-start ps-2 fw-bold">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control mb-0" {{old('password_confirmation')}} placeholder="Nhập lại mật khẩu"
                       name="password_confirmation">
                @error('password_confirmation')
                <p class="text-danger text-start ps-2 fw-bold">{{$message}}</p>
                @enderror
            </div>
            <button class="btn btn-primary">Đăng kí</button>
            <div class="my-5">
                Đã có tài khoản? <a href="{{route('login')}}">Đăng nhập ngay!</a>
            </div>
        </form>
        <!-- ./ form -->
    </div>
@endsection
