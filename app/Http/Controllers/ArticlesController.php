<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Article;

class ArticlesController extends Controller
{

    public function index()
    {
        return Article::all();
    }

    public function store(Request $request)
    {
        return Article::create($request->all());
    }

    public function show(Article $article)
    {
        return $article;
    }

    public function update(Request $request, Article $article)
    {
        return $article->update($request->all());
    }

    public function destroy(Article $article)
    {
        return (string) $article->delete();
    }

}