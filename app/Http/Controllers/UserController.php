<?php

namespace App\Http\Controllers;

use App\Models\News;

class UserController extends Controller
{
    public function beranda()
    {
        // Headline: berita terbaru (terbaru 1)
        $headline = News::latest()->first();

        // Berita selain headline, diambil 15 lalu diacak
        $articles = News::latest()->skip(1)->take(15)->get()->shuffle();

        // Berita terbaru (ambil 12 terakhir lalu acak)
        $recentArticles = News::latest()->take(12)->get()->shuffle();

        // Berita populer (top 5 berdasarkan views)
        $popularArticles = News::orderBy('views', 'desc')->take(5)->get();

        return view('user.beranda', compact(
            'headline',
            'articles',
            'recentArticles',
            'popularArticles'
        ));
    }
}