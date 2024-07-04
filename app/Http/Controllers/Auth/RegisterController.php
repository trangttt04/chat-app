<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Mail\RegisterEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function showFormRegister(){
        return view('auth.showFormRegister');
    }

    public function register(Request $request){
        $name = $request->input('first_name') . ' ' . $request->input('last_name');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));

        Mail::to($email)->queue(new RegisterEmail(route('home')));

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);

        toastr()->info('Tạo tài khoản thành công!','Chúc mừng');
        return redirect()->route('login');
    }
}
