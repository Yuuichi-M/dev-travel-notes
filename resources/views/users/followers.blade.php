@extends('layouts.app')

@section('title', 'マイページ')

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
            <a class="nav-link deep-orange-text" href="{{ route('users.likes', ['name' => $user->name]) }}">
                <i class="fas fa-heart mr-1"></i>
                いいね一覧
            </a>
        </li>
    </ul>

    @foreach($followers as $person)

    @include('users.person')

    @endforeach

</div>
<div class="pt-3">
    @include('commons.footer')
</div>

@endsection
