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
        //n+1問題解消　create_atを降順で並び替え　ページネーション9
        $articles = article::with('user')->orderBy('created_at', 'desc')->paginate(9);
        //category　n+1問題解消
        $categories = article::with('category')->limit(5)->get();
        //カテゴリー取得
        $prefectures = Category::orderBy('sort_no')->get();
        return view('articles.index', compact('articles', 'categories'))->with('prefectures', $prefectures);
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

    public function edit(Article $article)
    {
        $prefectures = Category::orderBy('sort_no')->get();
        return view('articles.edit', ['article' => $article])->with('prefectures', $prefectures);
    }
}
