<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $article = Article::paginate(10);
        return view('home', compact('article'));
    }

    public function search(Request $request)
    {
        $searchText = $request->input('searchText');
        $article = Article::where('content', 'LIKE', "%{$searchText}%")
            ->orWhere('title', 'LIKE', "%{$searchText}%")
            ->paginate(10);
        $article->appends(['search' => $searchText]);

        return view('home', compact('article'));
    }
}
