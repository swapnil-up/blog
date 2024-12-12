<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return inertia('Homepage', [
            'articles' => $articles
        ]);
    }

    public function store(Request $request)
    {
        $request->merge([
            'tags' => is_string($request->tags) ? json_decode($request->tags, true) : $request->tags,
        ]);
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'tags' => 'array|exists:tags,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $filepath = $request->file('image')->store('articles', 'public');
            $validated['image_path'] = $filepath;
        }

        $article = Article::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'image_path' => $validated['image_path'] ?? null,
        ]);

        if (!empty($validated['tags'])) {
            $article->tag()->attach($validated['tags']);
        }

        return redirect('/');
    }

    public  function show($id)
    {

        $article = Article::with('tag')->find($id);
        return inertia('Articles/ShowArticle', [
            'article' => $article
        ]);
    }

    public function getComments($id)
    {
        $comments = Comment::where('article_id', $id)->get();

        return response()->json($comments);
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return inertia('Articles/UpdateArticle', [
            'article' => $article
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $article = Article::findOrFail($id);
        $article->update($validated);

        return redirect('/');
    }

    public function delete($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect('/');
    }
}
