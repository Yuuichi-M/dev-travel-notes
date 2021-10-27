@extends('layouts.app')

@section('title', '記事一覧')

@include('layouts.nav')

@section('content')

<div class="container">
    @foreach($articles as $article)

    @include('articles.articleList')

    @endforeach
</div>
@endsection
