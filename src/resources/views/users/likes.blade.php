@extends('layouts.app')

@section('title', $user->name . 'のいいねした記事')

@include('commons.header')

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
            <a class="nav-link active text-white deep-orange lighten-1" href="{{ route('users.likes', ['name' => $user->name]) }}">
                <i class="far fa-heart mr-1"></i>
                いいね一覧
            </a>
        </li>

    </ul>

    @foreach($articles as $article)

    @include('articles.articleList')

    @endforeach

</div>

<div class="pt-3">
    @include('commons.footer')
</div>

@auth
<a href="{{ route('articles.create') }}" class="deep-orange lighten-1 text-white d-inline-block d-flex justify-content-center align-items-center flex-column post-button" role="button" title="投稿">
    <div>
        <i class="fas fa-plus plus-icon"></i>
        <div class="mb-1"><i class="far fa-paper-plane paper-plane-icon"></i></div>
    </div>
</a>
@endauth

@endsection
