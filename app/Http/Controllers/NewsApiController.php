<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsApiController extends Controller
{
  public function index()
  {
    $news = News::with('category')->latest()->paginate(10);
    return response()->json($news);
  }

  public function show(News $news)
  {
    $news->load('category');
    return response()->json($news);
  }

  // Kalau mau lengkap dengan create/update/delete via API,
  // tinggal tambahkan method store, update, destroy sama seperti controller admin
}