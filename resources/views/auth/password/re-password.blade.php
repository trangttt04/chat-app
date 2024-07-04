@extends('layouts.app')
@section('title')
    Đặt lại mật khẩu
@endsection
@section('content')
<div class="form-wrapper">

    <!-- logo -->
    <div class="logo my-5">
        <img src="{{asset('assets/media/img/logo-full-2x.png')}}" alt="logo">
    </div>
    <!-- ./ logo -->

    <h5>Đặt lại mật khẩu</h5>

    <!-- form -->
    <form ng-submit="resetPassword()">
        <div class="form-group">
            <input type="text" class="form-control" ng-model="password" placeholder="Mật khẩu mới..." required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" ng-model="passwordConfirmation" placeholder="Nhập lại mật khẩu..." required>
        </div>
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
