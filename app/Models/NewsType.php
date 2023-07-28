<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsType extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'news_id'
    ];
    public function news(){
        return $this->belongsTo(News::class,('news_id'));
    }
}
