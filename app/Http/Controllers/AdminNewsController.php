<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\News;

class AdminNewsController extends Controller
{
  public function index()
  {
    $news = News::all();
    return view('admin.news.index', compact('news'));
  }

  public function create()
  {
    $categories = Category::all();
    return view('admin.news.create', compact('categories'));
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'title' => 'required|string|max:255',
      'content' => 'required|string',
      'category_id' => 'required|array',
      'category_id.*' => 'exists:categories,id',
      'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $data = [
      'title' => $validated['title'],
      'content' => $validated['content'],
      'author_id' => auth()->id(),
    ];

    if ($request->hasFile('gambar')) {
      $data['gambar'] = $request->file('gambar')->store('images/thumbnail', 'public');
    }

    $news = News::create($data);

    // Sync categories
    $news->categories()->sync($validated['category_id']);

    // Redirect or response
    return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan.');
  }


  public function edit($id)
  {
    $news = News::findOrFail($id);
    $categories = Category::all(); // agar kategori juga muncul saat edit
    return view('admin.news.edit', compact('news', 'categories'));
  }

  public function update(Request $request, $id)
  {
    $validated = $request->validate([
      'title' => 'required|string|max:255',
      'content' => 'nullable|string',
      'category_id' => 'required|array',
      'category_id.*' => 'exists:categories,id',
      'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $news = News::findOrFail($id);

    if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
      if ($news->gambar && \Storage::disk('public')->exists($news->gambar)) {
        \Storage::disk('public')->delete($news->gambar);
      }
      $validated['gambar'] = $request->file('gambar')->store('images/thumbnail', 'public');
    }

    $news->update($validated);

    // Sync categories
    $news->categories()->sync($validated['category_id']);

    // Redirect or response
    return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui.');
  }

  public function destroy($id)
  {
    $news = News::findOrFail($id);
    $news->delete();

    return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus.');
  }

  public function show($id)
  {
    $news = News::with('categories', 'editor')->findOrFail($id);
    return view('admin.news.show', compact('news'));
  }



}