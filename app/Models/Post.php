<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    use HasFactory;
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function comment_posts()
    {
        return $this->hasMany(CommentPost::class,'post_id');
    }

    public function tags(){
        return $this -> belongsToMany('App\Models\Tag','tag_post', 'post_id', 'tag_id');
    }
}
