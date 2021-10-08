<?php

namespace App\Services;
use App\Models\Post;
use App\Models\CommentPost;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class CommentPostService {

    function getCommentPostByIdPost($id_post){
        $commentPosts =  DB::table('comment_posts')
                        ->join('users', 'users.id', '=', 'comment_posts.user_id')
                        ->join('user_details', 'user_details.user_id', '=', 'users.id')
                        ->where('comment_posts.post_id', '=', $id_post)
                        ->select('users.name', 'users.user_web',  'comment_posts.*' , 'user_details.avatar')
                        ->get();

        return $commentPosts;
    }


    function save($post_id,  $content ) {
        $user_id = Auth::user()->id;

        $commentPost =  CommentPost::create([

            'user_id' => $user_id,
            'post_id' => $post_id,
            'content' => $content,

        ]);

        return $commentPost;

    }

}