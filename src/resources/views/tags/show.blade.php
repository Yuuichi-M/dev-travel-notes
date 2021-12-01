@extends('layouts.app')

@section('title', '記事一覧')

@include('commons.header')

@section('content')

<div class="pt-4">
    <h4 class="text-center text-dark">{{ $tag->hashtag }}</h2>
        <div class="text-center text-muted">
            {{ $tag->articles->count() }}件
        </div>
        <hr class="border mx-auto" style="width: 200px;">
</div>

<div class="container">

    @foreach($tag->articles as $article)

    @include('articles.articleList')

    @endforeach

</div>
@endsection
