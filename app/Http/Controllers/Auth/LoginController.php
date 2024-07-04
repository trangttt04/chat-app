<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showFormLogin(){
        return view('auth.showFormLogin');
    }

    public function login(LoginRequest $request){
        $data = $request->only(['email','password']);
        if(Auth::attempt($data,$request->boolean('remember'))){
            toastr()->success('Chào mừng bạn đến với trang web!');
            return redirect(route('home'));
        }
        toastr()->error('Lỗi! Vui lòng xem lại thông tin tài khoản!');
        return back();
    }

    public function logout(){
        toastr()->info('Đã đăng xuất tài khoản!');
        if(Auth::check()){
            Auth::logout();
        }
        return redirect(route('login'));
    }
}
