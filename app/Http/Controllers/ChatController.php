<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChatRoom;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;
use App\Events\NewChatMessage;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ChatController extends Controller
{

    //Update ADMIN
    public function update(Request $request, $id){
        try{
            $message = DB::table('chat_messages') 
                    -> where('id', $id) 
                    -> update([
                        'message' => $request -> message
                    ]);

            return response()->json([
                'status' => true,
                'message' => $message,
                'success'=>"Messages Updated successfully"
            ]);

        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e -> getMessage(),
            ]);
        }

    }

    //Page ADMIN
    public function destroy(Request $request, $ids){
        try{
            // $ids = $request -> ids;
            $rs = DB::table("chat_messages")->whereIn('id',explode(",",  $ids  ))->delete();

            return response()->json([
                'status' => true,
                'result' => $rs,
                'success'=>"Messages Deleted successfully ".$rs." item."
            ]);

        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e
            ]);
        }
    }




    //page ADMIN
    public function getAllMessages(Request $request){

        $roomId = $request -> roomId;
        $user_name = $request -> user_name;

        $query = DB::table('chat_messages');
        $query  -> join('chat_rooms', 'chat_rooms.id', '=', 'chat_messages.chat_room_id')
                -> join('users','users.id', '=', 'chat_messages.user_id')
                -> select(
                    'chat_messages.id', 'chat_messages.message', 'chat_messages.created_at', 
                    // 'chat_messages.chat_room_id', 'chat_messages.user_id',
                    'users.name as user_name',
                    'chat_rooms.name as room_name' 
                );

        if($roomId != ''){
            $query -> where('chat_rooms.id', '=', $roomId);
        }

        if($user_name != ''){
            $query -> where('users.name', 'like', '%'.$user_name.'%');
        }

        $listMessagses = $query -> orderBy('created_at','desc') -> get();
        return response() -> json([
            'status' => true,
            'messages' => $listMessagses,
        ]);

    }


    //
    public function rooms(){
        return ChatRoom::all();
    }

    //
    public function messages($roomId){
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
