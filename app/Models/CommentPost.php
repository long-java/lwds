<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentPost extends Model
{
    use HasFactory;

    protected $guarded = [  //bo qua cac thuoc tinh trong nay
        
    ];


    public function posts()
    {
        return $this->belongsTo(Post::class,'post_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }




}
