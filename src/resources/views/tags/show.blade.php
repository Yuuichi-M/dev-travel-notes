@extends('layouts.app')

@section('title', 'タグ検索一覧')

@include('commons.header')

@section('content')

<div class="pt-2">
    <h5 class="text-center text-dark">{{ $tag->hashtag }}</h5>
    <div class="text-center text-muted">
        タグ検索結果 : {{ $tag->articles->count() }}件
    </div>
    <hr class="border mx-auto my-1" style="width: 200px;">
</div>

<div class="container">

    @foreach($tag->articles as $article)

    @include('articles.articleList')

    @endforeach

</div>
@endsection
