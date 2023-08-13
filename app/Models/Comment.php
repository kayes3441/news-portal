<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function reply(){
        return $this->hasMany(Comment::class,'comment_reply_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
