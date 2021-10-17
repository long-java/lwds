<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{

    //ADMIN GET-ALL USERS
    public function getAllUsers(Request $request){
        try{
            $name = $request -> name;
            $user_web = $request -> user_web;
            $email = $request -> email;

            $query = DB::table('users');
            $query -> select(
                'users.id', 'users.name', 'users.user_web', 'users.email', 'users.created_at',
                DB::raw('(SELECT count(*) FROM posts WHERE posts.user_id = users.id )  as count_posts'),
            );

            if($name != ''){
                $query -> where('name','like','%'.$name.'%');
            }
            if($user_web != ''){
                $query -> where('user_web','like','%'.$user_web.'%');
            }
            if($email != ''){
                $query -> where('email','like','%'.$email.'%');
            }

            return response() -> json([
                'status' => true,
                'users' => $query -> orderBy('created_at','desc')  -> get(),
            ]);

        }catch(\Exception $e){
            return response() -> json([
                'status' => false,
                'messages' => $e -> getMessage(),
            ]);
        }

    }


    //ADMIN - DESTROY USERS
    public function destroy(Request $request, $ids){
        try{
            $idsArr = explode(",",  $ids  );
            
            foreach($idsArr as $id){
                $user = DB::table("users") -> where('id', $id);
                $user_detail = DB::table("user_details") -> where('user_id', $id);

                if($user != null){
                    $rs = $user -> delete();
                    $rs2 = $user_detail -> delete();
                }

            }

            return response()->json([
                'status' => true,
                'success'=>"Messages Deleted successfully"
            ]);

        }catch(\Exception $e){
            return response()->json([
                'ids' => $ids,
                'idArr' => explode(",", $ids),
                'status' => false,
                'message' => $e
            ]);
        }
    }

    //ADMIN - UPDATE USER
    public function update(Request $request, $id){
        try{
            $user = DB::table('users') 
                    -> where('id', $id) 
                    -> update([
                        'name' => $request -> name,
                        'user_web' => $request -> user_web,
                        'email' => $request -> email,
                    ]);

            return response()->json([
                'status' => true,
                'user' => $user,
                'success'=>"Messages Updated successfully"
            ]);

        }catch(\Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e -> getMessage(),
            ]);
        }

    }
    















    //success: 200, falied: 404
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $user = User::where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'message' => 'These credentials do not match our records.'
                ], 404);
            }

            Auth::attempt($request->only('email', 'password'));
        
            $token = $user->createToken('my-app-token')->plainTextToken;

            return response() -> json([
                'status' => true,
                'code' => 200,
                'user' => $user,
                'token' => $token
            ]);
    }

    public function logout(Request $request){

        try{
            // $request->user()->currentAccessToken()->delete();
            // $request->user()->tokens()->where('id', auth()->id())->delete();

            Auth::guard('web')->logout();

            return response() -> json([
                'status' => true,
                'code' => 201,
                'message' => 'Logout Success'
            ]);

        }catch(\Exception $e){
            return response() -> json([
                'status' => false,
                'code' => 401,
                'message' => $e
            ]);
        }

    }




    public function profile($user_id){
        // $user_id = $request -> user() -> id;
        $isFollow = false;

        
        if($user_id == "my"){
            $user_id = Auth::user() -> id;
            $isFollow = 'isMe';
        }

        
        
        $user = DB::table('users')
                ->join('user_details', 'user_details.user_id', '=', 'users.id')
                ->where('users.id', '=', $user_id)
                ->select('users.name', 'users.user_web', 'user_details.avatar')
                ->get() -> first();


        if(isset(Auth::user()-> id)){
            $myUserId = Auth::user() -> id;
            $rs = DB::table('user_follow')
                        -> where('to', '=', $user_id)
                        -> where('from', '=', $myUserId)
                        -> select('*')
                        -> get();
            if($rs -> first() != null ){
                $isFollow = true;
            }

            if($myUserId == $user_id){
                $isFollow = 'isMe';
            }
        }

        return response() -> json([
            'status' => true,
            'code' => 200,
            'user' => $user,
            'isFollow' => $isFollow,
        ]);
    }



}
