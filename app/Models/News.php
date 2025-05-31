<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'content', 'author_id', 'gambar'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_news');
    }


    public function editor()
    {
        return $this->belongsTo(User::class, 'user_id'); // sesuaikan dengan nama kolom foreign key di tabel news
    }


}