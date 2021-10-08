<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class FollowService {

    //get all follower
    function getMyFollow($user_id){

        if($user_id == "my"){
            $user_id = Auth::user()->id;
        }

        $listFollower = DB::table('user_follow')
                        -> where('user_follow.from', $user_id)
                        -> join('users', 'users.id', '=', 'user_follow.to')
                        -> join('user_details','user_details.user_id', '=', 'users.id')
                        -> select('users.id', 'users.name', 'user_details.avatar',
                            DB::raw('(SELECT count(*) FROM posts WHERE posts.user_id = users.id )  as count_posts'),
                            DB::raw('(SELECT count(*) FROM user_follow WHERE user_follow.to = users.id )  as count_follow')
                        );

        return $listFollower -> get();

    }


    //get all follower
    function getMyFollowFrom($user_id){

        if($user_id == "my"){
            $user_id = Auth::user()->id;
        }

        $listFollower = DB::table('user_follow')
                        -> where('user_follow.to', $user_id)
                        -> join('users', 'users.id', '=', 'user_follow.from')
                        -> join('user_details','user_details.user_id', '=', 'users.id')
                        -> select('users.id', 'users.name', 'user_details.avatar',
                            DB::raw('(SELECT count(*) FROM posts WHERE posts.user_id = users.id )  as count_posts'),
                            DB::raw('(SELECT count(*) FROM user_follow WHERE user_follow.to = users.id )  as count_follow')
                        );

        return $listFollower -> get();

    }

    //add follower
    public function save($user_to_id, $isFollow ){
        $user_from_id = Auth::user()->id;

        if($isFollow  == 'false'){
            //add
            $rs = DB::table('user_follow')
                            -> insert([
                                'from' => $user_from_id,
                                'to' => $user_to_id
                            ]);
            $rs = $rs . ' Add Success';
        }else{
            //delete
            $rs = DB::table('user_follow')
                                -> where('to','=',$user_to_id)
                                -> where('from', '=', $user_from_id)
                                -> delete();
            $rs = 'Delete : '.$rs;
        }


        return $rs;

    }





}