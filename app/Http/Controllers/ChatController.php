<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatRoom;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;
use App\Events\NewChatMessage;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
        //
        public function rooms(){
            return ChatRoom::all();
        }
    
        //
        public function messages($roomId){
            // return ChatMessage::where('chat_room_id',$roomId)
            //         ->with('user')
            //         ->orderBy('created_at','ASC')
            //         ->get();

            return   DB::table('chat_rooms')
                    ->join('chat_messages', 'chat_messages.chat_room_id', '=', 'chat_rooms.id')
                    ->join('users', 'users.id', '=', 'chat_messages.user_id')
                    ->join('user_details', 'user_details.user_id', '=', 'users.id')
                    ->where('chat_rooms.id', '=', $roomId)
                    ->orderBy('created_at','ASC')
                    ->select('users.name', 'users.user_web','chat_messages.id','chat_messages.*', 'user_details.avatar', 'chat_rooms.id')
                    ->get();
        }
    
        //
        public function newMessage(Request $request,$roomId){
            $newMessage = new ChatMessage();
            //new
            $newMessage->id = DB::table('chat_messages')->max('id') + 1;
            //end new
            $newMessage->user_id = Auth::id();
            $newMessage->chat_room_id = $roomId;
            $newMessage->message = $request->message;
            $newMessage->save();
            broadcast(new NewChatMessage($newMessage))->toOthers();
            return $newMessage;
        }
}
