<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = [
            (object) [
                'id' => 1,
                'title' => '厳島神社(広島県)',
                'body' => '本文1',
                'category_id' => '1',
                'article_image' => '',
                'url' => 'https://www.google.co.jp/maps/place/%E5%8E%B3%E5%B3%B6%E7%A5%9E%E7%A4%BE/@34.2959885,132.3198262,17z/data=!4m9!1m2!2m1!1z5Y6z5bO256We56S-!3m5!1s0x601ae3047ec76d8f:0x357228f7d0b5d590!8m2!3d34.2959896!4d132.3198285!15sCgzljrPls7bnpZ7npL5aDyIN5Y6z5bO2IOelnuekvpIBDXNoaW50b19zaHJpbmU?hl=ja',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 1,
                    'name' => 'ユーザー名1',
                ],
            ],
            (object) [
                'id' => 2,
                'title' => '八坂神社(京都府)',
                'body' => '本文1',
                'category_id' => '2',
                'article_image' => '',
                'url' => 'https://www.google.co.jp/maps/place/%E5%85%AB%E5%9D%82%E7%A5%9E%E7%A4%BE/@35.0036603,135.7763594,17z/data=!3m2!4b1!5s0x600108c37522fc3f:0x57e98ccf344c71b9!4m5!3m4!1s0x60010879a010eca9:0xc77ac89d5a241ae9!8m2!3d35.0036559!4d135.7785534?hl=ja',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 2,
                    'name' => 'ユーザー名2',
                ],
            ],
            (object) [
                'title' => '晴明神社(京都府)',
                'body' => '本文1',
                'category_id' => '2',
                'article_image' => '',
                'url' => 'https://www.google.co.jp/maps/place/%E6%99%B4%E6%98%8E%E7%A5%9E%E7%A4%BE/@35.0277644,135.7489862,17z/data=!3m1!4b1!4m5!3m4!1s0x600107df798f7951:0xf28aea911a6811d0!8m2!3d35.02776!4d135.7511802?hl=ja',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 3,
                    'name' => 'ユーザー名3',
                ],
            ],
        ];

        return view('articles.index', ['articles' => $articles]);
    }
}
