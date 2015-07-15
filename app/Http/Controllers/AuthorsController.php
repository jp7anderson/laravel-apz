<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Http\Controllers\Controller;
use App\Author;
use Request;

class AuthorsController extends Controller
{

    public function index()
    {
        return Author::all();
    }

     public function store(AuthorRequest $request)
    {
        return Author::create($request->all());
    }

    public function show(Author $author)
    {
        return $author;
    }

    public function update(AuthorRequest $request, Author $author)
    {
        return $author->update($request->all());
    }

    public function destroy(Author $author)
    {
        return (string) $author->delete();
    }

}