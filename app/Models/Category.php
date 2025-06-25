<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function news()
    {
        return $this->belongsToMany(News::class, 'category_news');
    }

    public function limited_news()
    {
        return $this->hasMany(News::class, 'category_id')->latest()->limit(3);
    }
}