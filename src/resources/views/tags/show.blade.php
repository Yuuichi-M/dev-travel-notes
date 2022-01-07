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

    @auth
    <a href="{{ route('articles.create') }}" class="deep-orange lighten-1 text-white d-inline-block d-flex justify-content-center align-items-center flex-column post-button post-button-md post-button-lg post-button-max" role="button" title="投稿">
        <div>
            <i class="fas fa-plus plus-icon plus-icon-md plus-icon-lg plus-icon-max"></i>
            <div class="mb-1"><i class="far fa-paper-plane paper-plane-icon paper-plane-icon-md paper-plane-icon-lg paper-plane-icon-max"></i></div>
        </div>
    </a>
    @endauth

</div>

<div class="pt-3">
@include('commons.footer')
</div>

@endsection
