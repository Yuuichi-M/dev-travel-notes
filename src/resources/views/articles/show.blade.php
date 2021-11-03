@extends('layouts.app')

@section('title', '記事一覧')

@include('layouts.nav')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-8 col-xl-6">

            <div class="card mt-4 rounded">

                <h4 class="card-header font-weight-bold deep-orange lighten-1 text-center pb-3 pt-3">
                    <i class="fas fa-book-open text-white mr-1" style="font-size: 24px"></i>
                    <span class="text-white" style="font-size: 24px">Detail</span>
                </h4>

                <div class="card-body d-flex flex-row p-3 text-dark">
                    <i class="fas fa-user-circle fa-3x mr-1"></i>
                    <div>

                        <div class="font-weight-bold text-dark">
                            {{ $article->user->name }}
                        </div>

                        <div class="font-weight-lighter card-text">
                            {{ $article->created_at->format('Y/m/d H:i') }}
                        </div>

                    </div>

                    @if( Auth::id() === $article->user_id )
                    <!-- dropdown -->
                    <div class="ml-auto card-text">
                        <div class="dropdown">

                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <button type="button" class="btn btn-link text-muted m-0 p-2">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">

                                @auth
                                <a class="dropdown-item text-dark" href="{{ route("articles.edit", ['article' => $article]) }}">
                                    投稿を編集する
                                    <i class="fas fa-edit ml-1"></i>
                                </a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $article->id }}">
                                    投稿を削除する
                                    <i class="fas fa-trash-alt ml-1"></i>
                                </a>
                                @endauth

                            </div>
                        </div>
                    </div>
                    <!-- dropdown -->

                    <!-- modal -->
                    <div id="modal-delete-{{ $article->id }}" class="modal fade" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header font-weight-bold deep-orange lighten-1 text-center pb-3 pt-3">

                                    <span class="text-white" style="font-size: 18px">
                                        <i class="fas fa-trash-alt text-white mr-1" style="font-size: 20px"></i>
                                        DELETE ARTICLE
                                    </span>

                                    <button type=" button" class="close text-white" data-dismiss="modal" aria-label="閉じる">
                                        <span aria-hidden="true">&times;</span>
                                    </button>

                                </div>

                                <form method="POST" action="{{ route('articles.destroy', ['article' => $article]) }}">
                                    @csrf
                                    @method('DELETE')

                                    <div class="modal-body">
                                        {{ $article->title }}
                                    </div>

                                    <div class="modal-body text-danger">
                                        <i class="far fa-hand-point-up mr-1" style="font-size: 18px"></i>
                                        本当に削除してもよろしいですか？
                                    </div>

                                    <div class="modal-footer justify-content-between btn-group">
                                        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">
                                            <i class="fas fa-backspace mr-1"></i>
                                            CANCEL
                                        </button>

                                        <button type="submit" class="btn btn-outline-danger">
                                            <i class="fas fa-trash-alt mr-1"></i>
                                            DELETE
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- modal -->

                </div>
                <div class="card-body">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-10">
                            <h4 class="card-title">
                                {{ $article->title }}
                            </h4>

                            <div class="card-text">
                                <i class="fas fa-map-marker-alt deep-orange-text"></i>
                                {{ $article->category->prefecture }}
                            </div>

                            <div class="card-text">
                                <i class="fas fa-link mr-1"></i><a href="{{ $article->url }}" target="_blank">{{ $article->url }}</a>
                            </div>

                            <div class="text-dark mt-3">
                                {!! nl2br(e( $article->summary )) !!}
                            </div>

                            @include('articles.like')

                            @include('articles.articleTag')

                        </div>
                    </div>

                    <button class="btn btn-block grey lighten-4 rounded-pill mt-4 mb-1 text-dark" title="戻る" type="button" onclick="location.href='{{ route("articles.index") }}'">
                        <i class="fas fa-arrow-left text-dark"></i>
                        Return
                    </button>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
