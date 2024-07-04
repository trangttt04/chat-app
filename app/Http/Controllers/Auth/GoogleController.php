<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\RegisterEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;

class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function google(){
        try{
            $userGoogle = Socialite::driver('google')->user();
            $user = User::where('email',$userGoogle->email)->first();
            if($user){
                Auth::login($user);
            }else{
                $user = User::create([
                    'name' => $userGoogle->name,
                    'email' => $userGoogle->email,
                    'avatar' => $userGoogle->avatar,
                    'password' => Hash::make(time().Str::random(14)),
                    'is_online' => false,
                ]);
                Auth::login($user);
                Mail::to($userGoogle->email)->queue(new RegisterEmail(route('home')));
            }
            toastr()->success('Chào mừng bạn đến với trang web!');
            return redirect(route('home'));
        }catch(\Exception $e){
            return redirect()->route('login');
        }
    }
}
