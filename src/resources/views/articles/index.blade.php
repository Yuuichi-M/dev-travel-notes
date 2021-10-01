@extends('layouts.app')

@section('title', '記事一覧')

@section('content')

@include('layouts.nav')

<div class="container">
    @foreach($articles as $article)
    <div class="card mt-3">
        <div class="card-body d-flex flex-row">
            <i class="fas fa-user-circle fa-3x mr-1"></i>
            <div>
                <div class="font-weight-bold">
                    {{ $article->user->name }}
                </div>
                <div class="font-weight-lighter">
                    {{ $article->created_at->format('Y/m/d H:i') }}
                </div>
            </div>
        </div>
        <div class="card-body pt-0 pb-2">
            <h3 class="h4 card-title">
                <i class="fas fa-torii-gate mr-1 text-danger"></i>{{ $article->title }}
                <i class="fas fa-torii-gate text-dark"></i>
            </h3>
            <div class="card-text">
                {!! nl2br(e( $article->body )) !!}
            </div>
            <div class="card-text>
                <p class=" col-md-6">
                URL : <a href="{{ $article->url }}" target="_blank">{{ $article->url }}</a>
                </p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

<!--shadow-none border-top-0 border-right-0 border-left-0 bg-light rounded-0-->
