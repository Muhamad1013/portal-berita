<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news'; // sesuaikan nama tabelnya

    protected $fillable = [
        'title',
        'content',
        'gambar',
        'views',
        'created_at',
        'updated_at',
    ];


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_news');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'user_id'); // sesuaikan dengan nama kolom foreign key di tabel news
    }


}