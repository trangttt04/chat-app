@extends('layouts.app')
@section('title')
    Xác thực
@endsection
@section('content')
<div class="form-wrapper">

    <!-- logo -->
    <div class="logo my-5">
        <img src="{{asset('assets/media/img/logo-full-2x.png')}}" alt="logo">
    </div>
    <!-- ./ logo -->

    <h5>Xác thực yêu cầu</h5>

    <!-- form -->
    <form ng-submit="checkCode()">
        <div class="d-flex gap-2 justify-content-center mb-4">
            <div>
                <input autofocus type="text" style="font-size: 2rem ;width: 50px; height: 80px; border: 1px solid #333; text-align: center;border-radius: 5px;" placeholder="1" id="code1" ng-keyup="focusNextInput($event, 'code2','code1')" ng-model="code1" required>
            </div>
            <div>
                <input type="text" style="font-size: 2rem ;width: 50px; height: 80px; border: 1px solid #333; text-align: center;border-radius: 5px;" placeholder="2" id="code2" ng-keyup="focusNextInput($event, 'code3','code1')" ng-model="code2" required>
            </div>
            <div>
                <input type="text" style="font-size: 2rem ;width: 50px; height: 80px; border: 1px solid #333; text-align: center;border-radius: 5px;" placeholder="3" id="code3" ng-keyup="focusNextInput($event, 'code4','code2')" ng-model="code3" required>
            </div>
            <div>
                <input type="text" style="font-size: 2rem ;width: 50px; height: 80px; border: 1px solid #333; text-align: center;border-radius: 5px;" placeholder="4" id="code4" ng-keyup="focusNextInput($event, 'code5','code3')"  ng-model="code4" required>
            </div>
            <div>
                <input type="text" style="font-size: 2rem ;width: 50px; height: 80px; border: 1px solid #333; text-align: center;border-radius: 5px;" placeholder="5" id="code5" ng-keyup="focusNextInput($event, 'code6','code4')"  ng-model="code5" required>
            </div>
            <div>
                <input type="text" style="font-size: 2rem ;width: 50px; height: 80px; border: 1px solid #333; text-align: center;border-radius: 5px;" placeholder="6" id="code6"  ng-keyup="focusNextInput($event, 'code6','code5')"   ng-model="code6" required>
            </div>
        </div>
        <button class="btn btn-primary">Xác nhận</button>
        <div class="my-5">
            Không phải bạn? <a href="#!login">Đăng nhập bằng tại khoản khác!</a>
        </div>
    </form>
    <!-- ./ form -->
</div>
@endsection
