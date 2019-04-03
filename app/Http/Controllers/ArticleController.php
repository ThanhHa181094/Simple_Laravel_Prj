<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Image;


class
ArticleController extends Controller
{
    public static $extension = ['png', 'jpeg', 'jpg'];

    public static function getExtension($string)
    {
        for ($i = 0; $i < strlen($string); $i++) {
            if ($string[$i] == '.') {
                return substr($string, $i + 1);
            }
        }
        return 'not found';
    }

    public static function checkValidExtension($string)
    {
        foreach (ArticleController::$extension as $extension) {
            if (ArticleController::getExtension($string) == $extension) {
                return true;
            }
        }
        return false;
    }

    //Api
    public function index()
    {
        return Article::all();
    }

    public function articleApiGetById($id)
    {
        return Article::find($id);
    }

    public function articleApiCreate(Request $request)
    {
        Article::create($request->all());
        return 'update success';

    }

    public function articleApiUpdate(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->update($request->all());

        return $article;
    }

    public function articleApiDelete(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return 204;
    }

    public function articleApiPatch()
    {

    }


    //CRUD function
    public function add()
    {
        return view('article.add');

    }

    public function edit($id)
    {
        $article = Article::find($id);
        // $url = action('UserController@profile', ['id' => 1]);
        return view('article.edit', compact('article'));
    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('/home');

    }

    public function store(Request $request)
    {

        $article = new Article();
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        if (isset($request->image_link)) {
            $this->validate($request, [
                'image_link' => 'image|mimes:jpeg, jpg, png|max:2048'
            ]);
            $image = $request->file('image_link');
            $image->move('images/', $image->getClientOriginalName());
            $article->image_link = $image->getClientOriginalName();

        } else {
            $article->image_link = 'default.png';
        }

        $article->save();
        return redirect('/home')->with('status', 'Add article successfully');


    }

    public function update(Request $request, $id)
    {

        $article = Article::find($id);

        $content = $request->input('content');
        $title = $request->input('title');
        if (isset($request->image_link)) {
            $this->validate($request, [
                'image_link' => 'image|mimes:jpeg, jpg, png|max:2048'
            ]);
            $image = $request->file('image_link');
            $image->move('images/', $image->getClientOriginalName());
            $article->image_link = $image->getClientOriginalName();

        }
        if (isset($title)) {
            $article->title = $title;
        }
        if (isset($content)) {
            $article->content = $content;
        }
        $article->save();

        return redirect('/home');

    }


}
