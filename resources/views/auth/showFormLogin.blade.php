@extends('layouts.app')
@section('title')
    Đăng nhập
@endsection
@section('content')
    <div class="form-wrapper">

        <!-- logo -->
        <div class="logo my-5">
            <img src="{{asset('assets//media/img/logo-full-2x.png')}}" alt="logo">
        </div>
        <!-- ./ logo -->

        <h5>Đăng nhập</h5>

        <!-- form -->
        <form action="{{route('login')}}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control mb-0" name="email" value="{{old('email')}}" placeholder="Email của bạn" required autofocus>
                @error('email')
                    <p class="text-danger text-start ps-2 fw-bold">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control mb-0" name="password" {{old('password')}} placeholder="Mật khẩu" required>
                @error('password')
                <p class="text-danger text-start ps-2 fw-bold">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group d-flex justify-content-between">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="remember" checked id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Nhớ tôi</label>
                </div>
                <a href="#!send-mail/reset-password">Quên mật khẩu</a>
            </div>
            <button class="btn btn-primary">Đăng nhập</button>
            <div class="my-5">
                <p>Login with your social media account.</p>
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="#" class="btn btn-floating btn-sm btn-facebook">
                            <i class="mdi mdi-facebook"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="btn btn-floating btn-sm btn-twitter">
                            <i class="mdi mdi-twitter"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="btn btn-floating btn-sm btn-linkedin">
                            <i class="mdi mdi-linkedin"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="{{route('google.redirect')}}" class="btn btn-floating btn-sm btn-google">
                            <i class="mdi mdi-google"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" class="btn btn-floating btn-sm btn-instagram">
                            <i class="mdi mdi-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="my-5">
                <p>Không có tài khoản? <a href="{{route('register')}}">Đăng ký ngay!</a></p>
            </div>
        </form>
    </div>
@endsection
