<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index()
    {
        // Berita Indonesia
        $response = Http::get('http://api.mediastack.com/v1/news', [
            'access_key' => config('services.mediastack.api_key'),
            'countries' => 'id',
            'limit' => 15,
        ]);

        $data = $response->json();

        // if (isset($data['error'])) {
        //     dd($data);
        // }

        $articles = collect($data['data'] ?? [])->map(function ($item) {
            return [
                'title' => $item['title'],
                'description' => $item['description'] ?? '-',
                'link' => $item['url'],
                'pubDate' => $item['published_at'],
                'image_url' => $item['image'] ?? null,
            ];
        });

        // Berita Internasional
        $intlResponse = Http::get('http://api.mediastack.com/v1/news', [
            'access_key' => config('services.mediastack.api_key'),
            'countries' => 'us,de,fr',
            'languages' => 'en',
            'limit' => 9,
        ]);

        $intlData = $intlResponse->json();

        $internationalArticles = collect($intlData['data'] ?? [])->map(function ($item) {
            return [
                'title' => $item['title'],
                'description' => $item['description'] ?? '-',
                'link' => $item['url'],
                'pubDate' => $item['published_at'],
                'image_url' => $item['image'] ?? null,
            ];
        });

        return view('home', compact('articles', 'internationalArticles'));
    }
}