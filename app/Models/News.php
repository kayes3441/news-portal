<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [

    ];
    use HasFactory;

    public function tags(){
        return $this->hasMany(Tag::class,'news_id');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function news_type(){
        return $this->hasMany(NewsType::class,'news_id');
    }
    public function comment(){
        return $this->hasMany(Comment::class,'news_id')->where('comment_reply_id','=',null);
    }

}
