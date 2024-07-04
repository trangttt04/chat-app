@extends('layouts.app')
@section('title')
    Gửi mail
@endsection
@section('content')
<div class="form-wrapper">

    <!-- logo -->
    <div class="logo my-5">
        <img src="{{asset('assets/media/img/logo-full-2x.png')}}" alt="logo">
    </div>
    <!-- ./ logo -->

    <h5>Gửi yêu cầu</h5>

    <!-- form -->
    <form ng-submit="sendMail()">
        <divclass="form-group">
        <input type="text" class="form-control" ng-model="email" placeholder="Email của bạn..." required autofocus>
        </divclass=>
        <button class="btn btn-primary">Xác nhận</button>
        <div class="my-5">
            <p>Thực hiện hành động khác.</p>
            <a href="#!register">Đăng kí ngay!</a>
            or
            <a href="#!login">Đăng nhập ngay!</a>
        </div>
    </form>
    <!-- ./ form -->

</div>
@endsection
