<?php

namespace App\Http\Controllers;

use App\Events\UserStatusOnline;
use App\Http\Controllers\CRUD\FriendController;
use App\Models\Role;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $roles = Role::all();
        $friends = (new FriendController)->index();
        $social = $this->setSocial();
        return view('homepage.home',compact('roles','friends','social'));
    }

    public function setSocial(){
        $data = [];
        $user = auth()->user();
        $social = $user->socials()->withPivot('links')->get();
        foreach($social as $s){
            $data[$s->name] = $s->pivot->links;
        }
        return $data;
    }
}
