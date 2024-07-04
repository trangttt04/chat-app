<?php

namespace App\Http\Controllers;

use App\Events\ToggleMessage;
use App\Http\Controllers\CRUD\MessageController;
use App\Models\Message;
use App\Models\Role;
use App\Models\User;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function changeStatus(Request $request){
        try {
            $user = User::findOr($request->id);

            $role = Role::find(3);
            if(!Gate::forUser($user)->allows('roles',$role)){
                $user->update([
                    'is_online' => $request->data
                ]);
            }else{
                $user->update([
                    'is_online' => false
                ]);
            }

            return response()->json([
                'data' => $user,
                'message' => 'Sửa trạng thái thành công',
            ],200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function setMessage(Request $request){
        $id = $request->user['id'];
        Message::where('to_id', $id)->where('seen', 0)->update(['seen' => 1]);
    }

    public function updateProfile(Request $request){
        $profile = auth()->user()->profile;
        $data = [
            'name' => $request->input('fullname'),
        ];
        if($request->hasFile('image')){
            $file = $request->file('image');
            $upload = Cloudinary::upload($file->getRealPath(),[
              'folder' => 'avatar-user'
            ]);
            $url = $upload->getSecurePath();
            $data['avatar'] = $url;
        }
        auth()->user()->update($data);
        $dataProfile = [
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'about' => $request->input('about'),
        ];
        if($profile){
            $profile->update($dataProfile);
        }else{
            auth()->user()->profile()->create($dataProfile);
        }
        return response()->json($request->all());
    }

    public function updateSocials(Request $request){

        $data = $request->all();

        $result = collect($data)->map(function ($item,$key) {
            if($item){
                return ['links' => $item];
            }
        });

        $result = $result->filter(function($i){
            return $i !== null;
        });


        auth()->user()->socials()->sync($result);
        return response()->json([
            'message' => 'update success'
        ],200);
    }

    public function deleteNotification($id){
        try {
            $notification = auth()->user()->notifications()->find($id);
            if(!$notification){
                return response()->json(['error' => 'Thông báo không tồn tại'], 404);
            }
            $notification->delete();
            return response()->json(['message' => 'Xóa thành công'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Lỗi máy chủ'], 500);
        }
    }

    public function toggleRoles(Request $request){
        $id = $request->input('id');
        if($id){
            $role = \DB::table('role_user')->where('role_id', $id)->where('user_id', auth()->id())->first();
            if($role){
                \DB::table('role_user')->where('role_id', $id)->where('user_id', auth()->id())->delete();
            }else{
                auth()->user()->roles()->attach($id);
            }
            return response()->json([
                'message' => 'Thành công',
            ],200);
        }
        return response()->json([
            'message' => 'Dữ liệu không hợp lệ',
        ],400);
    }
}
