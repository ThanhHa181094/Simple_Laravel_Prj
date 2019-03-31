<?php

namespace App\Http\Controllers;
//
//use Illuminate\Http\Request;
//
//class ArticleController extends Controller
//{
//    //
//}
use App\Article;

class ArticleController extends Controller
{
    //Get
    public function index()
    {
        return Article::all();
    }
    //Get
    public function show(Article $article)
    {
        return $article;
    }
    //Póst
    public function store(Request $request)
    {
        $article = Article::create($request->all());

        return response()->json($article, 201);
    }
    //Put
    public function update(Request $request, Article $article)
    {
        $article->update($request->all());

        return response()->json($article, 200);
    }
    //Delete
    public function delete(Article $article)
    {
        $article->delete();

        return response()->json(null, 204);
    }
}
