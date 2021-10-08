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


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
