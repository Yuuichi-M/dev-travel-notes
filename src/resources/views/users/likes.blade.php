@extends('layouts.app')

@section('title', $user->name . 'のいいねした記事')

@include('layouts.nav')

@section('content')

<div class="container">

    @include('users.profile')

    <ul class="nav nav-tabs nav-justified mt-3">

        <li class="nav-item">
            <a class="nav-link deep-orange-text" href="{{ route('users.show', ['name' => $user->name]) }}">
                <i class="fas fa-paper-plane mr-1"></i>
                投稿一覧
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link active text-white deep-orange lighten-2" href="{{ route('users.likes', ['name' => $user->name]) }}">
                <i class="far fa-heart mr-1"></i>
                いいね一覧
            </a>
        </li>

    </ul>

    @foreach($articles as $article)

    @include('articles.articleList')

    @endforeach

</div>

@endsection
