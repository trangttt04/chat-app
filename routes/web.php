<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\{
    LoginController,
    RegisterController,
    GoogleController,
};
use App\Http\Controllers\{
    HomeController,
    UserController,
};
use App\Http\Controllers\CRUD\{
    FriendController,
    MessageController,
};


Route::get('login', [LoginController::class,'showFormLogin'])->name('login');
Route::post('login', [LoginController::class,'login'])->name('login');
Route::match(['get','post'],'logout', [LoginController::class,'logout'])->name('logout');
Route::get('register', [RegisterController::class,'showFormRegister'])->name('register');
Route::post('register', [RegisterController::class,'register'])->name('register');

//Socials
Route::get('/auth/redirect', [GoogleController::class,'redirectToGoogle'])->name('google.redirect');
Route::get('/auth/google', [GoogleController::class,'google'])->name('google');


Route::middleware('auth')->group(function(){
    Route::get('/', [HomeController::class,'home'])->name('home');
    Route::post('user/change-status',[UserController::class,'changeStatus'])->name('change.online');
    Route::put('user/change-message',[UserController::class,'setMessage'])->name('change.message');
    Route::post('user/change-profile',[UserController::class,'updateProfile'])->name('change.profile');
    Route::post('user/change-socials',[UserController::class,'updateSocials'])->name('change.social');
    Route::delete('user/notifications/{id}',[UserController::class,'deleteNotification'])->name('delete.notification');
    Route::post('user/roles',[UserController::class,'toggleRoles'])->name('toggle.roles');

    Route::resource('friend',FriendController::class);
    Route::resource('message',MessageController::class);
});


Route::get('test',function(){
   $user = \App\Models\User::find(1);
   $user->notify(new \App\Notifications\SendFriendNotification($user,'đã gửi cho bạn một lời mời kết bạn!','friend'));
//   broadcast(new \App\Events\SendFriendEvent($user));
});

Route::get('get',function(){
   $user = auth()->user();
   return $user->notifications;
});

Route::get('delete', function () {
    $notifications = auth()->user()->notifications;

    foreach ($notifications as $notification) {
        $notification->delete();
    }

    return 'Deleted all notifications';
});
