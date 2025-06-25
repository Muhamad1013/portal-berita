<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil berita umum untuk headline dan populer
        $articles = Cache::remember('latest_articles', 60, function () {
            $response = Http::get('https://newsapi.org/v2/everything', [
                'apiKey' => config('services.newsapi.api_key'),
                'q' => 'berita',
                'language' => 'id',
                'pageSize' => 30,
                'sortBy' => 'publishedAt',
            ]);

            $data = $response->json();

            if (!isset($data['articles']) || $data['status'] !== 'ok') {
                return collect([]);
            }

            return collect($data['articles'])->map(function ($item) {
                return [
                    'title' => $item['title'] ?? 'Judul tidak tersedia',
                    'description' => $item['description'] ?? '-',
                    'link' => $item['url'] ?? '#',
                    'pubDate' => $item['publishedAt'] ?? now(),
                    'image_url' => $item['urlToImage'] ?? 'https://via.placeholder.com/600x400?text=No+Image',
                    'categories' => [], // ini akan kita isi nanti
                ];
            });
        });

        // Ambil berita berdasarkan kategori dari top-headlines
        $kategoriApi = [
            'Global' => 'general',
            'Teknologi' => 'technology',
            'Ekonomi' => 'business',
            'Olahraga' => 'sports',
            'Hiburan' => 'entertainment',
            'Nasional' => 'general',
        ];

        $kategoriNonLoginList = [];

        foreach ($kategoriApi as $label => $apiCategory) {
            $cacheKey = 'kategori_' . strtolower($label);
            $kategoriNonLoginList[$label] = Cache::remember($cacheKey, 60, function () use ($label, $apiCategory) {
                $params = [
                    'apiKey' => config('services.newsapi.api_key'),
                    'category' => $apiCategory,
                    'pageSize' => 6,
                    'country' => $label === 'Global' ? 'us' : 'id',
                ];

                $response = Http::get('https://newsapi.org/v2/top-headlines', $params);
                $data = $response->json();

                if (!isset($data['articles']) || $data['status'] !== 'ok') {
                    return collect();
                }

                return collect($data['articles'])->map(function ($item) {
                    return [
                        'title' => $item['title'] ?? 'Judul tidak tersedia',
                        'description' => $item['description'] ?? '-',
                        'link' => $item['url'] ?? '#',
                        'pubDate' => $item['publishedAt'] ?? now(),
                        'image_url' => $item['urlToImage'] ?? 'https://via.placeholder.com/600x400?text=No+Image',
                    ];
                });
            });
        }

        // Masukkan kategori ke artikel pertama (headline)
        if ($articles->count() > 0) {
            $headline = $articles->first();
            $headlineCategories = [];

            foreach ($kategoriNonLoginList as $namaKategori => $list) {
                foreach ($list as $item) {
                    // Jika link sama, anggap sama
                    if ($item['link'] === $headline['link']) {
                        $headlineCategories[] = [
                            'id' => strtolower($namaKategori), // id bisa kamu ganti sesuai route
                            'name' => $namaKategori
                        ];
                        break;
                    }
                }
            }

            $articles->transform(function ($item, $key) use ($headlineCategories) {
                if ($key === 0) {
                    $item['categories'] = $headlineCategories;
                }
                return $item;
            });
        }

        return view('home', compact('articles', 'kategoriNonLoginList'));
    }
}