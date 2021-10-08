<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    use HasFactory;
    protected $table = 'user_contacts';
    protected $guarded = [  //bo qua cac thuoc tinh trong nay
        
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function writer_users()
    {
        return $this->belongsTo(User::class,'writer_id');
    }
}
