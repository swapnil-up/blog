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
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'tags' => 'array|exists:tags,id'
        ]);

        $article = Article::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
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
