@extends('layouts.app')

@section('title', '記事一覧')

@include('commons.articleIndexHeader')

@section('content')
<div style="padding-top: 3rem">

    <!-- <div class="pt-2">
        <h4 class="text-center text-dark">Posts</h4>
        <div class="text-center text-muted">
            {{ $articles->count() }}件
        </div>
        <hr class="border mx-auto" style="width: 200px;">
    </div> -->

    <div class="container">

        @foreach($articles as $article)

        @include('articles.articleList')

        @endforeach

    </div>

    @auth
    <a href="{{ route('articles.create') }}" class="deep-orange lighten-1 text-white d-inline-block d-flex justify-content-center align-items-center flex-column" role="button" title="投稿" style="position: fixed; bottom: 45px; right: 30px; width: 150px; height: 150px; border-radius: 75px; object-fit: cover; width: 70px; height: 70px;">
        <div>
            <i class="fas fa-plus" style="font-size: 12px;"></i>
            <div class="mb-1"><i class="far fa-paper-plane" style="font-size: 30px;"></i></div>
        </div>
    </a>
    @endauth

</div>

@endsection
