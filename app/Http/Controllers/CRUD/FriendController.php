<?php

namespace App\Http\Controllers\CRUD;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use App\Models\Message;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FriendController extends Controller
{
    public function index(){
        $id = auth()->id();
        $data = $this->listFriends($id);
        return $data;
    }

    public function show($email){
        $validator = Validator::make(['email' => $email], [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Email không hợp lệ!'], 400);
        }

        $user = User::where('email',$email)->first();

        if($user){
            if($user->email == auth()->user()->email){
                return response()->json([
                    'error' => 'Đây là tài khoản của bạn',
                ], 400);
            }

            $role = Role::find(2);
            $userId = auth()->id();
            $friendId = $user->id;
            $seenFriend = Friend::where('from_id',$userId)->where('to_id',$friendId)->first();
            $toFriend = Friend::where('to_id',$userId)->where('from_id',$friendId)->first();

            if($seenFriend){
                if($seenFriend->status != 0){
                    $user->statusFriend = 'seen';
                }else{
                    $user->statusFriend = 'friend';
                }
                $user->idStatusFriend = $seenFriend->id;
            }else if($toFriend){
                if($toFriend->status != 0){
                    $user->statusFriend = 'to';
                }else{
                    $user->statusFriend = 'friend';
                }
                $user->idStatusFriend = $toFriend->id;
            }

            if(!Gate::forUser($user)->allows('roles',$role)){
                $user->load('profile');
            }

            $socials = $user->socials()->withPivot('links')->get();
            $userSocials = [];
            foreach($socials as $s){
                $userSocials[] = [
                    'link' => $s->pivot->links,
                    'name' => $s->name
                ];
            }
            $user->socials = $userSocials;
            return response()->json([
                'data' => $user,
                'message' => 'Lấy tài khoản thành công!',
            ],200);
        }
        return response()->json([
            'error' => 'Tài khoản không tồn tại!',
        ],404);
    }

    public function store(Request $request){
        $data = $request->input('data');
        $message = $request->input('message') ?? '';
        $idUser = auth()->id();
        foreach($data as $id){
            $from = Friend::where('from_id',$idUser)->where('to_id',$id)->first();
            $to = Friend::where('from_id',$id)->where('to_id',$idUser)->first();
            if($from){
                $from->update([
                    'status' => 1,
                    'message' => $message,
                ]);
                $toUser = User::find($from->to_id);
                $fromUser = User::find($from->from_id);
                $toUser->notify(new \App\Notifications\SendFriendNotification($fromUser,'có một lời mời kết bạn chưa được phản hồi!','friend'));
            }else if($to){
                $to->update([
                    'status' => 0,
                    'message' => $message,
                ]);
                $fromUser = User::find($to->from_id);
                $toUser = User::find($to->to_id);
                $fromUser->notify(new \App\Notifications\SendFriendNotification($toUser,'đã chấp nhận lời mời kết bạn của bạn!','friend'));
            }else{
                Friend::create([
                    'from_id' => $idUser,
                    'to_id' => $id,
                    'message' => $message,
                    'status' => 1
                ]);
                $fromUser = User::findOr($idUser);
                $user = User::find($id);
                $user->notify(new \App\Notifications\SendFriendNotification($fromUser,'đã gửi cho bạn một lời mời kết bạn!','friend'));
            }
        }
        return response()->json([
            'message' => 'Thêm bạn bè thành công',
        ],200);
    }

    public function update($id,Request $request){
        if($request->has('status')){
            $status = $request->input('status');
            $friend = Friend::findOr($id,function(){
                abort(404);
            });
            $friend->update([
                'status' => $status,
            ]);
            $user = User::find($friend->from_id);
            $user->notify(new \App\Notifications\SendFriendNotification($user,'đã chấp nhận lời mời kết bạn của bạn!','friend'));
             return response()->json([
                 'success' =>'Đã thêm vào danh sách bạn bè',
             ],201);
        }
        return response()->json([
            'message' => 'Không tìm thấy thông tin cần thiết',
        ],400);
    }

    public function destroy($id){
        Friend::destroy($id);
        return response()->json([
            'message' => 'Xóa thành công',
        ],204);
    }

    public function listFriends($id){
        $friends = Friend::where(function($query) use ($id) {
            $query->where('from_id',$id)->orWhere('to_id',$id);
        })->where('status',0)->get();
        $role = Role::find(2);
        $data = $friends->map(function($friend) use ($id,$role) {
            $idUser = $friend->from_id == $id ? $friend->to_id : $friend->from_id;
            $us = User::find($idUser);

            $lastMessage = Message::where(function($query) use ($id, $idUser) {
                $query->where('from_id', $id)->where('to_id', $idUser)
                    ->orWhere('from_id', $idUser)->where('to_id', $id);
            })->latest()->first();

            $us->setAttribute('last_message', $lastMessage);

            if(!Gate::forUser($us)->allows('roles',$role)){
                return $us->load('profile');
            }else{
                return $us;
            }
        });
        return $data;
    }


}
