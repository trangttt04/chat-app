<?php

namespace App\Http\Controllers\CRUD;

use App\Events\SendMessage;
use App\Events\ToggleMessage;
use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request){
    }

    public function show($toId,Request $request){
        $id = auth()->id();
        $messages = Message::where(function($query) use ($id){
            $query->where('from_id', $id)->orWhere('to_id', $id);
        })->where(function($query) use ($toId){
            $query->where('from_id', $toId)->orWhere('to_id', $toId);
        });

        $this->updateStatusView();

        $messages = $messages->orderBy('id','desc')->simplePaginate(20);
        $messages->getCollection()->transform(function ($message) {
            $message->time_send = $message->created_at->format('h:i A');
            return $message;
        });
        $messages = array_reverse($messages->toArray()['data']);
        return response()->json($messages);
    }

    public function store(Request $request){
        $message = Message::create([
            'from_id' => auth()->id(),
            'to_id' => $request->id,
            'attachment' => '',
            'body' => $request->message,
            'seen' => 0
        ]);
        $message->last_time = $message->created_at->format('h:i A');
        $data = $message->load('from_user');
        broadcast(new SendMessage($data))->toOthers();
        return response()->json($data);
    }

    public function update($id,Request $request){
        $seen = $request->input('status');
        if(is_numeric($seen)){
            $message = Message::findOrFail($id);
            $message->update([
                'seen' => $seen
            ]);
            $message->last_time = $message->created_at->format('h:i A');
            broadcast(new ToggleMessage($message))->toOthers();
            return response()->json($message,200);
        }
        return response()->json('Trạng thái không hợp lệ',400);
    }

    public function updateStatusView($seen = 2){
        Message::where('to_id',auth()->id())->whereIn('seen',[0,1])->update(['seen'=>$seen]);
    }
}
