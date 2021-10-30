<?php

namespace App\Services;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class TagService {

    //ADMIN - GUEST
    public function getAll($e){
        $query = DB::table('tags');
        $query -> join('users', 'users.id', '=', 'tags.user_creative_id' );


        if($e == ''){
            $query -> select('tags.id', 'tags.text', 'tags.description', 'tags.image', 'tags.created_at' , 'users.name', 'users.user_web');
        }else{

            $query -> leftJoin('tag_post', 'tag_post.tag_id', '=', 'tags.id' )
                    ->select('tags.*', 'users.user_web', 
                        DB::raw('(SELECT count(*) FROM tag_post WHERE tags.id = tag_post.tag_id )  as count_posts')    
                    )
                    ->groupBy('tags.id','users.user_web');
                    
            if($e == 'popular'){
                $query ->orderBy('count_posts','desc');  //sort by popular
            }else{ 

                if($e == 'name'){
                    $query ->orderBy('tags.text','asc');  //sort by name tag
                }else{
                    $query ->orderBy('tags.created_at','desc');  //sort by created_at
                }
            }
        }

        return $query -> get();
    }

    //ADMIN - UPDATE AND CREATE
    public function save($data, $id=null){
        $idCurrent = Auth::id();
        $tag = Tag::updateOrCreate(
            [
                'id' => $id
            ],
            [
                'text' => $data['text'],
                'description' => $data['description'],
                'user_creative_id' => $idCurrent
            ]
        );
        return $tag;

    }

    //ADMIN - DELETE MULTI - TAG
    public function destroyMulti($ids){
        $idsArr = explode(",",  $ids  );
        foreach($idsArr as $id){
            $tag = Tag::find($id);
            if($tag != null){
                $rs = $tag -> delete();
            }
        }
        return $rs;
    }
    
    

}