<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'priority',
        'logo',
        'parent_id',
        'status'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id')->orderBy('priority','desc');
    }

    public function childes()
    {
        return $this->hasMany(Category::class, 'parent_id')->orderBy('priority','asc');
    }
    public function news()
    {
        return $this->hasMany(News::class, 'category_id')->orderBy('id','desc');
    }
}
