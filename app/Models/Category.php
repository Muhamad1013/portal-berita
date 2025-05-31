<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // Sesuaikan dengan field yang ada di migration

    // Relasi: Satu kategori punya banyak berita
    public function news()
    {
        return $this->belongsToMany(News::class, 'category_news');
    }



}