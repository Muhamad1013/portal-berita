<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminCategoryController extends Controller
{
  public function index()
  {
    $categories = Category::latest()->get();
    return view('admin.categories.index', compact('categories'));
  }

  public function create()
  {
    return view('admin.categories.create');
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required|string|max:255|unique:categories,name',
    ]);

    Category::create($validated);

    return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil ditambahkan.');
  }

  public function edit($id)
  {
    $category = Category::findOrFail($id);
    return view('admin.categories.edit', compact('category'));
  }

  public function update(Request $request, $id)
  {
    $category = Category::findOrFail($id);

    $validated = $request->validate([
      'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
    ]);

    $category->update($validated);

    return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil diperbarui.');
  }

  public function destroy($id)
  {
    $category = Category::findOrFail($id);
    $category->delete();

    return redirect()->route('admin.categories.index')->with('success', 'Kategori berhasil dihapus.');
  }

}