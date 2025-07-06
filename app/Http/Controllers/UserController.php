<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;

class UserController extends Controller
{
    public function beranda()
    {
        $headline = News::latest()->first();
        $kategoriNasional = Category::where('name', 'Nasional')->first();

        if ($kategoriNasional) {
            $headline = $kategoriNasional->news()
                ->latest()
                ->first();

            $articles = $kategoriNasional->news()
                ->where('news.id', '!=', optional($headline)->id)
                ->latest()
                ->take(9)
                ->get()
                ->shuffle();
        } else {
            $headline = null;
            $articles = collect();
        }

        $recentArticles = News::latest()->take(12)->get();
        $popularArticles = News::orderBy('views', 'desc')->take(9)->get();

        // Ambil semua kategori yang punya relasi berita
        $kategoriList = Category::whereHas('news')->get();

        // Ambil maksimal 4 berita terbaru untuk setiap kategori
        foreach ($kategoriList as $kategori) {
            $kategori->limited_news = $kategori->news()->latest()->take(4)->get()->shuffle();
        }

        $globalCategory = Category::where('name', 'Global')->first();
        $globalArticles = $globalCategory
            ? $globalCategory->news()->latest()->take(6)->get()
            : collect();


        return view('user.beranda', compact(
            'headline',
            'articles',
            'recentArticles',
            'popularArticles',
            'kategoriList',
            'globalArticles'
        ));
    }

    // Tambahkan method baru untuk filter kategori
    public function filterByCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);

        // Ambil semua berita dulu, acak, lalu manual paginasi
        $shuffledNews = $category->news()->get()->shuffle();

        // Manual pagination
        $currentPage = request()->get('page', 1);
        $perPage = 10;
        $pagedData = $shuffledNews->slice(($currentPage - 1) * $perPage, $perPage)->values();
        $paginated = new \Illuminate\Pagination\LengthAwarePaginator(
            $pagedData,
            $shuffledNews->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        $otherArticles = News::whereHas('categories', function ($q) use ($category) {
            $q->where('categories.id', '!=', $category->id);
        })
            ->latest()
            ->take(5)
            ->get();


        return view('user.beranda-filtered', [
            'category' => $category,
            'filteredArticles' => $paginated,
            'otherArticles' => $otherArticles,
        ]);
    }



    public function show($id)
    {
        $berita = News::findOrFail($id);

        // Ambil kategori dari berita ini
        $kategoriIds = $berita->categories->pluck('id');

        // Cari berita terkait dengan kategori yang sama (kecuali dirinya sendiri)
        $relatedNews = News::whereHas('categories', function ($query) use ($kategoriIds) {
            $query->whereIn('categories.id', $kategoriIds);
        })
            ->where('id', '!=', $berita->id)
            ->latest()
            ->take(5)
            ->get();

        $popularNews = News::orderBy('views', 'desc')->take(5)->get();

        return view('user.berita-show', compact('berita', 'relatedNews', 'popularNews'));
    }


}
