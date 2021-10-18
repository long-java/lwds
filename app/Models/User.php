<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'email_verified_at',
        'user_web',
        'password',
        'fb_id',
        'email_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function roles()
    {
        return $this->belongsToMany('App\Models\Role','user_role', 'user_id', 'role_id')->withTimestamps();
    }



    public function posts()
    {
        return $this->hasMany(Post::class,'user_id');
    }

    public function user_details()
    {
        return $this->hasOne (UserDetail::class,'user_id');
    }

    public function comment_posts()
    {
        return $this->hasMany(CommentPost::class,'user_id');
    }




    public function contact_users()
    {
        return $this->hasMany(UserContact::class,'user_id');
    }

    public function contact_writer_users()
    {
        return $this->hasMany(UserContact::class,'writer_id');
    }

}
