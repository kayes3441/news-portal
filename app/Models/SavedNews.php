<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SavedNews extends Model
{
    use HasFactory;
    public function news(){
        return $this->belongsTo(News::class,'news_id');
    }
}
