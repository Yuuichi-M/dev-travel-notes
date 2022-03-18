<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card mt-3 shadow-none" style="border-radius: 1rem">
            <div class="card-body d-flex p-3 border-bottom">
                <a class="mr-1 d-flex align-items-center" href="{{ route('users.show', ['name' => $article->user->name]) }}" style="text-decoration: none;">
                    @if (!empty($article->user->avatar_file_name))
                    <img src="{{ asset('https://portfolio-s3-backe.s3.ap-northeast-1.amazonaws.com/avatars/' . $article->user->avatar_file_name) }}" class="rounded-circle" style="object-fit: cover; width: 33px; height: 33px;">
                    @else
                    <img src="/images/avatar-default.svg" class="rounded-circle" style="object-fit: cover; width: 33px; height: 33px;">
                    @endif
                </a>
                <a class="font-weight-bold text-dark d-flex align-items-center ml-2" href="{{ route('users.show', ['name' => $article->user->name]) }}" style="font-size: 16px; text-decoration: none;">
                    {{ $article->user->name }}
                </a>

                @if( Auth::id() === $article->user_id )
                <!-- dropdown -->
                <div class="ml-auto d-flex align-items-center card-text">
                    <div class="dropdown">
                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <button type="button" class="btn btn-link text-muted m-0 p-2">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item text-dark" href="{{ route('articles.edit', ['article' => $article]) }}">
                                <i class="fas fa-edit mr-2"></i>
                                投稿を編集する
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $article->id }}">
                                <i class="fas fa-trash-alt mr-2"></i>
                                投稿を削除する
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
                                <span class="text-white" style="font-size: 18px;">
                                    <i class="fas fa-trash-alt text-white mr-1" style="font-size: 20px"></i>
                                    Delete Post
                                </span>
                                <button type="button" class="close text-white" data-dismiss="modal" aria-label="閉じる">
                                    <span aria-hidden="true">
                                        &times;
                                    </span>
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
                                    <button type="button" class="btn btn-light shadow-none" data-dismiss="modal">
                                        <i class="fas fa-backspace mr-1"></i>
                                        キャンセル
                                    </button>
                                    <button type="submit" class="btn btn-danger shadow-none">
                                        <i class="fas fa-trash-alt mr-1"></i>
                                        削除する
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
                <!-- modal -->

            </div>
            <a class="jumbotron jumbotron-fluid shadow-none p-0 m-0" href="{{ route('articles.show', ['article' => $article]) }}" style="text-decoration: none;">
                @if (!empty($article->image_file_name))
                <img src="{{ asset('https://portfolio-s3-backe.s3.ap-northeast-1.amazonaws.com/article_img/' . $article->image_file_name) }}" class="" width="100%">
                @else
                <img src="/images/スクリーンショット 2022-03-18 20.57.57.png" class="" width="100%">
                @endif
            </a>
            <div class="col-md-12 p-3">
                <a href="{{ route('articles.show', ['article' => $article]) }}" style="text-decoration: none;">
                    <div class="text-truncate text-dark card-title h5 mb-1" style="max-width: 400px;">
                        {{ $article->title }}
                    </div>
                    <div class="font-weight-lighter grey-text small">
                        <span>
                            {{ $article->category->prefecture }}
                        </span>
                        <span class="ml-1">
                            {{ $article->created_at->format('Y/m/d H:i') }}
                        </span>
                    </div>
                    <div class="text-truncate text-muted mt-2" style="max-width: 500px;">
                        {{ $article->summary }}
                    </div>
                </a>

                @include('articles.articleTag')

                <div class="d-flex flex-row align-items-center">

                    @include('articles.like')

                    <span class="pl-4 d-flex align-items-center" style="text-decoration: none; padding-top: 8px;">
                        <a href="{{ route('articles.show', ['article' => $article]) }}#comment-list" style="text-decoration: none;">
                            <i class="far fa-comment text-dark"></i>
                        </a>
                        <span class="d-flex align-items-center" style="padding-left: 12.5px;">
                            {{ $article->comments->count() }}
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
