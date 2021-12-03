@extends('layouts.app')

@section('title', '記事一覧')

@include('commons.header')

@section('content')

<form class="form-inline" method="GET" action="{{ route('articles.index') }}">
    <div class="mx-auto mt-3">
        <div class="input-group">
            <div class="input-group-prepend">
                <select class="custom-select" name="category">
                    <option value="">全て</option>
                    @foreach ($prefectures as $prefecture)
                    <option value="prefecture:{{$prefecture->id}}" class="font-weight-bold">{{$prefecture->prefecture}}</option>
                    @endforeach
                </select>
            </div>
            <input type="text" name="keyword" class="form-control" aria-label="Text input with dropdown button" placeholder="キーワード検索">
            <div class="input-group-append">
                <button type="submit" class="btn btn-outline-dark shadow-none m-0" style="padding-top: 10px; padding-bottom: 9px; border-style: solid;">
                    <i class=" fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>
</form>

<div class="pt-2">
    <h4 class="text-center text-dark">Posts</h4>
    <div class="text-center text-muted">
        {{ $articles->count() }}件
    </div>
    <hr class="border mx-auto" style="width: 200px;">
</div>

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

@endsection
