@extends('layouts.app')

@section('title', '記事一覧')

@include('commons.articleIndexHeader')

@section('content')
<div class="mb-3" style="padding-top: 3rem">

    <div class="pt-2 mt-2">
        <div class="text-center text-muted">
            投稿数 : {{ $articles->count() }}件
        </div>
        <hr class="border mx-auto my-1" style="width: 200px;">
    </div>

    <div class="container">

        @foreach($articles as $article)

        @include('articles.articleList')

        @endforeach

    </div>

    <div class="d-flex justify-content-center pt-3">
        {{ $articles->links('vendor.pagination.bootstrap-4') }}
    </div>

    @auth
    <a href="{{ route('articles.create') }}" class="deep-orange lighten-1 text-white d-inline-block d-flex justify-content-center align-items-center flex-column post-button post-button-md post-button-lg post-button-max" role="button" title="投稿">
        <div>
            <i class="fas fa-plus plus-icon plus-icon-md plus-icon-lg plus-icon-max"></i>
            <div class="mb-1"><i class="far fa-paper-plane paper-plane-icon paper-plane-icon-md paper-plane-icon-lg paper-plane-icon-max"></i></div>
        </div>
    </a>
    @endauth

</div>

@endsection
