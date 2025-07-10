<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use App\Models\Comment;
use App\Models\CommentReaction;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function beranda()
    {
        $headline = News::latest()->first();
        $kategoriNasional = Category::where('name', 'Nasional')->first();

        if ($kategoriNasional) {
            $headline = $kategoriNasional->news()->latest()->first();

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
        $kategoriList = Category::whereHas('news')->get();

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

    public function search(Request $request)
    {
        $query = $request->q;

        $results = News::with('categories')
            ->when($query, function ($q) use ($query) {
                $q->where('title', 'like', "%$query%")
                    ->orWhere('content', 'like', "%$query%");
            })
            ->when($request->kategori, function ($q) use ($request) {
                $q->whereHas('categories', function ($cat) use ($request) {
                    $cat->where('categories.id', $request->kategori);
                });
            })
            ->when($request->tanggal, function ($q) use ($request) {
                $q->whereDate('created_at', $request->tanggal);
            })
            ->latest()
            ->paginate(10);

        $kategoriList = Category::all();

        return view('user.search-result', compact('results', 'query', 'kategoriList'));
    }


    public function storeComment(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Comment::create([
            'news_id' => $id,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil dikirim.');
    }

    public function replyComment(Request $r, $id)
    {
        $r->validate(['content' => 'required']);

        Comment::create([
            'news_id' => $r->news_id,
            'user_id' => auth()->id(),
            'content' => $r->content,
            'parent_id' => $id,
        ]);

        return back();
    }

    public function editComment(Request $r, $id)
    {
        $r->validate(['content' => 'required']);
        $comment = Comment::findOrFail($id);
        abort_if($comment->user_id != auth()->id(), 403);

        $comment->update(['content' => $r->content]);

        return back();
    }

    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);
        abort_if($comment->user_id != auth()->id(), 403);

        $comment->delete();

        return back();
    }

    public function reactComment(Request $request, $id)
    {
        $reaction = $request->reaction === 'like' ? 1 : -1;
        $comment = Comment::findOrFail($id);

        $reactionRecord = CommentReaction::firstOrNew([
            'comment_id' => $id,
            'user_id' => auth()->id()
        ]);

        if ($reactionRecord->reaction === $reaction) {
            $reactionRecord->delete();
        } else {
            $reactionRecord->reaction = $reaction;
            $reactionRecord->save();
        }

        return back();
    }

    public function filterByCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $shuffledNews = $category->news()->get()->shuffle();

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
        $berita = News::with(['comments.user', 'comments.replies.user', 'comments.reactions', 'categories'])->findOrFail($id);

        $kategoriIds = $berita->categories->pluck('id');

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