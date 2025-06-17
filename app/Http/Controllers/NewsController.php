<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsController extends Controller
{
    // Ambil dan tampilkan berita dari API GNews
    public function index()
    {
        $response = Http::get('https://gnews.io/api/v4/top-headlines', [
            'token' => env('GNEWS_API_KEY'), // API key dari .env
            'lang' => 'id',
            'country' => 'id',
            'max' => 12, // Jumlah berita ditampilkan
        ]);

        $berita = $response->json()['articles'] ?? [];

        return view('user.berita', compact('berita'));
    }

    // Tampilkan detail berita berdasarkan parameter di URL
    public function detail(Request $request)
    {
        $url = $request->query('url');

        // Validasi jika tidak ada URL
        if (!$url) {
            return redirect()->route('berita.index')->with('error', 'Berita tidak ditemukan.');
        }

        // Redirect langsung ke halaman asli berita
        return redirect()->away($url);
    }
}