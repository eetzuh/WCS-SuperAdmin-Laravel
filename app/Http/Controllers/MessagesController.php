<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;
use App\Models\Chats;
use App\Models\Friends;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
    public function index(Friends $friends, Request $request, Chats $chats)
    {
        $friend= DB::table('users')->where('id', $request->friendId)->first();
        $chat= $friends->where([['user_id', $request->friendId], ['friend_id', auth()->user()->id]])
            ->orWhere([['friend_id', $request->friendId], ['user_id', auth()->user()->id]])->first();
        $messageId= $chats->select('message_id')->where('participants', $chat->id)->get();
        $messages= DB::table('messages')->whereIn('id', $messageId)->get()->groupBy(function($query){
                return substr($query->created_at,0, 10);
            });

//        dd($date);
        return view('chats.index', ['chat'=>$chat, 'friend'=>$friend, 'messages'=>$messages]);
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
