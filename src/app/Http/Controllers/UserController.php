<?php

namespace App\Http\Controllers;

use App\User;
use App\Article;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(string $name)
    {
        //ユーザーモデル取得($nameと一致するモデル)
        $user = User::where('name', $name)->first();
        //記事モデル取得
        $articles = $user->articles->sortByDesc('id');

        return view('users.show', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }

    //いいね一覧表示
    public function likes(string $name)
    {
        //ユーザーモデル取得($nameと一致するモデル)
        $user = User::where('name', $name)->first();
        //記事モデル取得
        $articles = $user->likes->sortByDesc('id');

        return view('users.likes', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }

    //フォロー機能　フォロー
    public function follow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['name' => $name];
    }

    //フォロー機能　フォロー解除
    public function unfollow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);

        return ['name' => $name];
    }
}