<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use App\Article;
use App\Author;
use Request;

class ArticlesController extends Controller
{

    public function index()
    {
        $articles = Article::all();

        if (Request::wantsJson()) {
            return $articles;
        } else {
            return view('articles.index', compact('articles'));
        }
    }

    public function create()
    {
        $article = new Article;
        $authors = Author::lists('name', 'id')->all();

        return view('articles.create', compact('article', 'authors'));
    }

    public function store(ArticleRequest $request)
    {
        $article = Article::create($request->all());

        if (Request::wantsJson()) {
            return $article;
        } else {
            return redirect('articles');
        }
    }

    public function show(Article $article)
    {
        if (Request::wantsJson()) {
            return $article;
        } else {
            return view('articles.show', compact('article'));
        }
    }

    public function edit(Article $article)
    {
        $authors = Author::lists('name', 'id')->all();

        return view('articles.edit', compact('article', 'authors'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
         $deleted = $article->delete();

        if (Request::wantsJson()) {
            return (string) $deleted;
        } else {
            return redirect('articles');
        }
    }

    public function destroy(Article $article)
    {
        return (string) $article->delete();
    }
}