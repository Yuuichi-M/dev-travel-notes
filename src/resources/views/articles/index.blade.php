@extends('layouts.app')

@section('title', '記事一覧')

@include('commons.header')

@section('content')

<div class="container">
    @foreach($articles as $article)

    @include('articles.articleList')

    @endforeach
</div>
@endsection
