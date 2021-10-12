<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Article;
use App\User;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //一覧
    public function index()
    {
        //Modelの全データをコレクションで返す
        //create_atを降順で並び替え
        $articles = Article::all()->sortByDesc('created_at');
        return view('articles.index', ['articles' => $articles]);
    }

    //投稿画面
    public function create()
    {
        //所在地取得
        $prefectures = Category::orderBy('sort_no')->get();
        return view('articles.create')->with('prefectures', $prefectures);
    }

    //投稿機能
    public function store(ArticleRequest $request, Article $article)
    {
        //dd($request->all());

        $article->user_id = Auth::id();
        $article->fill($request->all());
        $article->save();
        return redirect()->route('articles.index');
    }
}
