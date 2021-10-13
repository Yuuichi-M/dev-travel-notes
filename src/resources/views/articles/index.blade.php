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

                        <a class="dropdown-item" href="{{ route("articles.edit", ['article' => $article]) }}">
                            <i class="fas fa-edit mr-1"></i>記事を更新する
                        </a>

                        <div class="dropdown-divider"></div>

                        <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $article->id }}">
                            <i class="fas fa-trash-alt mr-1"></i>記事を削除する
                        </a>

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

                            <div class="modal-body">
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
            <!-- modal -->
            @endif

        </div>
        <div class="card-body pt-0 pb-2">

            <h3 class="h4 card-title">
                {{ $article->title }}
            </h3>

            <div class="card-text">{{ $article->category->prefecture }}</div>

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
