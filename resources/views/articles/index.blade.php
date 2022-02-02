@extends('layouts.app')

@section('title', '記事一覧')

@include('commons.articleIndexHeader')

@section('content')

@auth
<div style="padding-top: 3rem">
    @else
    <div>
        @endauth

        @guest
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item d-flex justify-content-center center active">
                    <img class="d-block home-img" src="/images/home6.jpg" alt="First slide">
                    <div class="mx-auto">
                        <div class="card shadow-none home-card" style="border-radius: 1rem;">
                            <div class="card-body text-center">
                                <div class="card-text">
                                    <div class="justify-content-center align-items-center">
                                        <div class="justify-content-center align-items-center deep-orange-text home-title">
                                            Travel nots
                                        </div>
                                        <div class="justify-content-center align-items-center home-message">
                                            旅行先での思い出を仲間と共有しよう。
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item d-flex justify-content-center center">
                    <img class="d-block home-img" src="/images/home1.1.jpg" alt="Second slide">
                    <div class="mx-auto">
                        <div class="card shadow-none home-card-second" style="border-radius: 1rem;">
                            <div class="card-body text-center">
                                <div class="card-text">
                                    <div class="justify-content-center align-items-center">
                                        <div class="justify-content-center align-items-center home-message pt-2">
                                            旅行先のグルメ、名所、宿の</br>
                                            情報や感想を自由に投稿しよう。
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item d-flex justify-content-center center">
                    <img class="d-block home-img" src="/images/home7.jpg" alt="Third slide">
                    <div class="mx-auto">
                        <div class="card shadow-none home-card-third" style="border-radius: 1rem;">
                            <div class="card-body text-center">
                                <div class="card-text">
                                    <div class="justify-content-center align-items-center">
                                        <div class="justify-content-center align-items-center home-message pt-2 home-message-third">
                                            他ユーザーの投稿にいいね
                                            <i class="fas fa-heart text-danger"></i>
                                            や</br>
                                            コメント
                                            <i class="fas fa-comment text-dark"></i>
                                            をして交流しよう。
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item d-flex justify-content-center">
                    <img class="d-block home-img" src="/images/home0.jpg" alt="Fourth slide">
                    <div class="mx-auto">
                        <div class="card shadow-none home-card-fourth" style="border-radius: 1rem;">
                            <div class="card-body text-center">
                                <div class="card-text">
                                    <div class="justify-content-center align-items-center">
                                        <div class="justify-content-center align-items-center home-title-fourth">
                                            今すぐ始めよう
                                        </div>
                                        <button class="btn btn-block deep-orange rounded-pill mt-4 text-white shadow-none" title="ゲストログイン" type="button" onclick="location.href='{{ route("register") }}'">
                                            <i class="fas fa-user-alt mr-1"></i>
                                            新規登録
                                        </button>
                                        <button class="btn btn-block deep-orange lighten-2 rounded-pill mt-4 text-white shadow-none" title="ゲストログイン" type="button" onclick="location.href='{{ route("login") }}'">
                                            <i class="fas fa-sign-in-alt mr-1"></i>
                                            ログイン
                                        </button>
                                        <button class="btn btn-block sunny-morning-gradient rounded-pill mt-4 text-white shadow-none" title="ゲストログイン" type="button" onclick="location.href='{{ route("login.guest") }}'">
                                            <i class="fas fa-user-tie mr-1"></i>
                                            ゲストログイン
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">
                Previous
            </span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon h1" aria-hidden="true"></span>
            <span class="sr-only">
                Next
            </span>
        </a>
    </div>

    @else

    <div class="container">

        <div class="row">
            <div class="col-8 offset-2">

                @if (session('status'))
                <div class="alert alert-success mt-3 mb-0 text-center" role="alert" style="font-size: 12px; border-radius: 1rem;">
                    {{ session('status') }}
                </div>
                @endif

            </div>
        </div>

        @foreach($articles as $article)

        @include('articles.articleList')

        @endforeach

    </div>
    <div class="d-flex justify-content-center pt-3">
        {{ $articles->links('vendor.pagination.bootstrap-4') }}
    </div>
    <a href="{{ route('articles.create') }}" class="deep-orange lighten-1 text-white d-inline-block d-flex justify-content-center align-items-center flex-column post-button" role="button" title="投稿">
        <div>
            <i class="fas fa-plus plus-icon"></i>
            <div class="mb-1">
                <i class="far fa-paper-plane paper-plane-icon"></i>
            </div>
        </div>
    </a>
    @endguest

</div>

@include('commons.footer')

@endsection
