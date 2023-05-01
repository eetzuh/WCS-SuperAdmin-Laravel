<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;
use App\Models\Chats;
use App\Models\Friends;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
    public function index(Frigends $friends, Request $request, Chats $chats)
    {
        $friend= DB::table('users')->where('id', $request->friendId)->first();
        $chat= $friends->where([['user_id', $request->friendId], ['friend_id', auth()->user()->id]])
            ->orWhere([['friend_id', $request->friendId], ['user_id', auth()->user()->id]])->first();
        $test= $chats->where('participants', $chat->id)->get();
        return view('chats.index', ['chat'=>$chat, 'friend'=>$friend, 'test'=>$test]);
    }
    public function sendMessage(Messages $message, Chats $chat, Request $request)
    {
        if($request->message != null){
            $message->message= $request->message;
            $message->sender_id= auth()->user()->id;
            $message->save();

            $chat->participants = $request->chatId;
            $chat->message_id= DB::table('messages')->orderBy('id', 'desc')->first()->id;
            $chat->save();
        }
        return back();
    }
}
