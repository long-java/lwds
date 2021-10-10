<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FollowService;

class FollowController extends Controller
{

    private $followService;
    public function __construct(FollowService $followService){
        $this -> followService = $followService;
    }

    //get all follower
    public function getMyFollow($user_id)
    {
        try{
            $follow = $this -> followService -> getMyFollow($user_id);

            if($follow -> first() != null){
                return response() -> json([
                    'status' => true,
                    'code' => 200,
                    'follow' => $follow,
                    'message' => "Success"
                ]);
            }else{
                return response() -> json([
                    'status' => true,
                    'code' => 200,
                    'message' => "NotFound"
                ]);
            }

        }catch(\Exception $e){
            return response() -> json([
                'status' => false,
                'code' => 404,
                'message' => $e->getMessage(),
            ]);
        }
    }

    //get all follower (Những người theo dõi mình)
    public function getMyFollowFrom($user_id)
    {
        try{
            $follow = $this -> followService -> getMyFollowFrom($user_id);

            if($follow -> first() != null){
                return response() -> json([
                    'status' => true,
                    'code' => 200,
                    'follow' => $follow,
                ]);
            }else{
                return response() -> json([
                    'status' => false,
                    'code' => 404,
                    'message' => "Not Found"
                ]);
            }

        }catch(\Exception $e){
            return response() -> json([
                'status' => false,
                'code' => 404,
                'message' => $e->getMessage(),
            ]);
        }
    }



    public function store($user_id, Request $request)
    {
        try{

            $isFollow =  $request -> isFollow;
            $rs = $this -> followService -> save($user_id, $isFollow );

            return response() -> json([
                'status' => true,
                'code' => 200,
                'rs' => $rs,
            ]);


        }catch(\Exception $e){
            return response() -> json([
                'status' => false,
                'code' => 404,
                'message' => $e->getMessage(),
            ]);
        }
    }



   
}
