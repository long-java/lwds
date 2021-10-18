<?php

namespace App\Services;
use App\Models\Post;
use App\Models\Tag;
use App\Models\CommentPost;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostService {

    //ADMIN - DELETE MULTI - POST
    public function destroyMulti($ids){
        $idsArr = explode(",",  $ids  );
        foreach($idsArr as $id){
            $post = Post::find($id);
            if($post != null){
                $rs = $post -> delete();
                $rs2 = $post -> tags() -> detach();
            }
        }
        return $rs;
    }



    //SAVE - ADMIN - UPDATE ONLY
    public function saveAdmin($data, $post_id = null) {
        $post = Post::find($post_id);
        if($post != null){
            $post -> update([
                'title' => $data['title'],
                'content_html' => $data['content_html'],
            ]);
        }
        return $post;
    }


    function delete($post_id){
        $post = Post::find($post_id);
        $post -> tags() -> detach();
        $post -> delete();
        return true;
    }

    function save($data, int $post_id = null) {
        $user_id = Auth::user()->id;

        if($post_id != null){
            $post = Post::find($post_id);
            $post -> tags() -> detach();
        }

        $tags = $data['tags'];
        $tag_id = '';
        $i = 0;
        $arr_tag = array();

        foreach($tags as $tag) {
            if(!isset($tag['id'])){
                $newTag = Tag::create([
                    'text' => $tag['text']
                ]);

                //if create
                $tag_id = $tag_id . ',' . ($newTag->id);
                $arr_tag[$i] = $newTag -> id;

            }else{
                $tag_id = $tag_id . ',' . $tag['id'];
                $arr_tag[$i] = $tag['id'];
            }
            $i += 1;
        }

        //new
        if($post_id == null){
            $post_id = DB::table('posts')->max('id') + 1;
        }
        //end new

        $post =  Post::updateOrCreate(
            [
                'id' => $post_id
            ],
            [
                'user_id' => $user_id,
                'title' => $data['title'],
                'content' => $data['content'],
                'content_html' => $data['content_html'],
                'tag_id' => $tag_id,
            ]
        );


        for($i=0; $i < count($arr_tag); $i++){
            $post -> tags() -> syncWithoutDetaching([ $arr_tag[$i] ]);
        }



        return $post;
    }



    function getMyPosts($user_id){  
        if($user_id == 'my'){
            $user_id = Auth::user()-> id;
        }          
        $query = Post::query();
        $query -> orderBy('created_at', 'DESC') ;
        $query -> where('user_id', '=', $user_id);
        return $query -> get();
    }


    //Get all posts || Get my posts
    function getAll($orderBys = [], $tag, $isFollow = 'yes',$search=''){
        
        // $posts = DB::table('posts')
        //         ->join('users', 'users.id', '=', 'posts.user_id')
        //         ->join('user_details', 'user_details.user_id', '=', 'users.id')
        //         ->select('users.name',  'posts.*' , 'user_details.avatar' )
        //         ->get();


        $query = Post::query();

        //Sort by view
        if($orderBys){
            $query->orderBy($orderBys['column'], $orderBys['sort']);
        }

        if($tag != '')
        {
            if($tag == 'home'){
                $query -> orderBy('created_at', 'DESC')->get(); 

                // $listFollow = [1,3];
                // $query -> whereIn('user_id', $listFollow);

                if($search != ''){
                    $query -> join('tag_post','tag_post.post_id', '=', 'posts.id')
                            -> join('tags','tags.id','=','tag_post.tag_id')

                            -> where('posts.title','like','%'.$search.'%') 
                            // -> orWhere('posts.content','like','%'.$search.'%') 
                            -> orWhere('tags.text','like','%'.$search.'%')
                            -> select('posts.*');
                }

                if($isFollow == 'yes'){
                    if(isset(Auth::user()-> id)){
                        $query  -> join('user_follow','user_follow.to', '=', 'posts.user_id' )
                                -> where('user_follow.from', '=', Auth::user()-> id)
                                -> select('posts.*');
                    }
                }


            }else{
                $query -> join('tag_post', 'tag_post.post_id', '=', 'posts.id')
                       -> where('tag_post.tag_id', '=', $tag)
                       -> select('posts.*');
            }
        }
            

        return $query -> get();
    }


    //Kiểm tra đã voted hay down chưa
    function checkVoteOrDown($id_post){
        $id_user = Auth::id() ?? -1; 
        $post = Post::find($id_post);
        $rsUp = false;
        $rsDown = false;

        $arr_user_voted = explode(",", $post -> user_voted);
        $arr_user_down = explode(",", $post -> user_down);

        for($i=0; $i < count($arr_user_voted); $i++) {
            //Nếu đã vote
            if($arr_user_voted[$i] == $id_user){
                $rsUp = true;
            }
        }

        for($i=0; $i < count($arr_user_down); $i++) {
            //Nếu đã down
            if($arr_user_down[$i] == $id_user){
                $rsDown = true;
            }
        }

        $data['rsUp'] = $rsUp;
        $data['rsDown'] = $rsDown;

        return $data;

       


    }
    

    function getNumberVoteById($id){
        $post = Post::find($id);
        return $post -> number_vote;
    }


    function getById($id){
        $post = Post::find($id);
        // increase number_view
        $post -> update([
            'number_view' => $post->number_view + 1,
        ]);
        return $post;
    }

    function calculateTimeBefore($timeBefore){
        $time_now = Carbon::now()->toDateTimeString();
        $rs =  Carbon::parse($time_now )->diffInHours(Carbon::parse($timeBefore));
        return $rs;
    }


    //Vote Up =============================
    public function voteUp($id_post){
        $id_user = Auth::id() ?? -1; 

        $post = Post::find($id_post);
        $numberVoteOld =  $post -> number_vote;
        $userVotedOld = $post -> user_voted;
        $userDownOld = $post -> user_down;

        $numberVoteNew = $numberVoteOld;
        $userVoteNew = $userVotedOld;
        $userDownNew = $userDownOld;

        $rsUp = 0;
        $rsDown = 0;

        $arr_user_voted = explode(",", $userVotedOld);
        $arr_user_down = explode(",", $userDownOld);

        for($i=0; $i < count($arr_user_voted); $i++) {
            //Nếu đã vote
            if($arr_user_voted[$i] == $id_user){
                $rsUp = 1;
            }
        }

        for($i=0; $i < count($arr_user_down); $i++) {
            //Nếu đã down
            if($arr_user_down[$i] == $id_user){
                $rsDown = 1;
            }
        }

        //Nếu đã vote
        if($rsUp == 1){
            //Chuỗi cần thay/ chuỗi thay vào/ Chuỗi nguồn
            // Bỏ voted
            $userVoteNew = str_replace( ','.$id_user, '', $userVotedOld );
            $numberVoteNew = $numberVoteOld - 1;
            
        //Nếu chưa vote
        }else{

            //Nếu đã down => (vote + 2), (remove user_down), (user_voted + id_user)
            if($rsDown == 1){
                $userDownNew = str_replace( ','.$id_user, '', $userDownOld );
                $numberVoteNew = $numberVoteOld + 2;
                $userVoteNew = $userVotedOld . ',' . $id_user;
            
            }else{
                $userVoteNew = $userVotedOld . ',' . $id_user;
                $numberVoteNew = $numberVoteOld + 1;
            }
        }

        $post -> update([
            'number_vote' => $numberVoteNew,
            'user_voted' => $userVoteNew,
            'user_down' => $userDownNew
        ]);

        return $post -> number_vote;
    }


    //Vote Down =============================
     public function voteDown($id_post){
        $id_user = Auth::id() ?? -1; 
        $post = Post::find($id_post);
        $numberVoteOld =  $post -> number_vote;
        $userVotedOld = $post -> user_voted;
        $userDownOld = $post -> user_down;

        $numberVoteNew = $numberVoteOld;
        $userVoteNew = $userVotedOld;
        $userDownNew = $userDownOld;

        $rsUp = 0;
        $rsDown = 0;

        $arr_user_voted = explode(",", $userVotedOld);
        $arr_user_down = explode(",", $userDownOld);

        for($i=0; $i < count($arr_user_voted); $i++) {
            //Nếu đã vote
            if($arr_user_voted[$i] == $id_user){
                $rsUp = 1;
            }
        }

        for($i=0; $i < count($arr_user_down); $i++) {
            //Nếu đã down
            if($arr_user_down[$i] == $id_user){
                $rsDown = 1;
            }
        }

        //Nếu đã down
        if($rsDown == 1){
            //Chuỗi cần thay/ chuỗi thay vào/ Chuỗi nguồn
            // Bỏ down
            $userDownNew = str_replace( ','.$id_user, '', $userDownOld );
            $numberVoteNew = $numberVoteOld + 1;
            
        //Nếu chưa down
        }else{

            //Nếu đã vote => (number - 2), (remove user_vote), (user_down + id_user)
            if($rsUp == 1){
                $userVoteNew = str_replace( ','.$id_user, '', $userVotedOld );
                $numberVoteNew = $numberVoteOld - 2;
                $userDownNew = $userDownOld . ',' . $id_user;
            
            }else{
                $userDownNew = $userDownOld . ',' . $id_user;
                $numberVoteNew = $numberVoteOld - 1;
            }
        }

        $post -> update([
            'number_vote' => $numberVoteNew,
            'user_voted' => $userVoteNew,
            'user_down' => $userDownNew
        ]);

        return $post -> number_vote;
    }





}