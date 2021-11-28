@extends('layouts.app')

@section('title', 'マイページ')

@include('commons.header')

@section('content')

<div class="container">

    @include('users.profile')

    <ul class="nav nav-tabs nav-justified mt-3">

        <li class="nav-item">
            <a class="nav-link active text-white deep-orange lighten-2" href="{{ route('users.show', ['name' => $user->name]) }}">
                <i class="far fa-paper-plane mr-1"></i>
                投稿一覧
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link deep-orange-text mr-1" href="{{ route('users.likes', ['name' => $user->name]) }}">
                <i class="fas fa-heart mr-1"></i>
                いいね一覧
            </a>
        </li>

    </ul>

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
