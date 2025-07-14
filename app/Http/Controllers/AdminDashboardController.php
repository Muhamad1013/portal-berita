<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalBerita = News::count();
        $totalKategori = Category::count();
        $totalPengguna = User::count();

        $beritaPerKategori = Category::withCount('news')->get();

        $kategoriTerbanyak = Category::with([
            'news' => function ($q) {
                $q->latest();
            }
        ])->withCount('news')->orderByDesc('news_count')->first();

        $topKategori = Category::withCount('news')
            ->orderByDesc('news_count')
            ->take(5)
            ->get();

        $persentaseKategoriTerbanyak = $kategoriTerbanyak && $totalBerita > 0
            ? round(($kategoriTerbanyak->news_count / $totalBerita) * 100, 1)
            : 0;

        // Tambahkan: Statistik Berita Harian untuk Line Chart
        $beritaHarian = News::select(DB::raw("DATE(created_at) as tanggal"), DB::raw("count(*) as total"))
            ->groupBy(DB::raw("DATE(created_at)"))
            ->orderBy('tanggal')
            ->get();

        // 5 berita terbaru
        $topBerita = News::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalBerita',
            'totalKategori',
            'totalPengguna',
            'beritaPerKategori',
            'kategoriTerbanyak',
            'topKategori',
            'persentaseKategoriTerbanyak',
            'beritaHarian',
            'topBerita'
        ));


    }
}