<div class="row justify-content-center">
    <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
        <div class="card mt-3">
            <div class="card-body">
                <div class="d-flex flex-row">

                    <!--ユーザーアイコン-->
                    <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                        <i class="fas fa-user-circle fa-3x"></i>
                    </a>

                    <!--フォローボタン-->
                    @if( Auth::id() !== $user->id )
                    <follow-button class="ml-auto" :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))' :authorized='@json(Auth::check())' endpoint="{{ route('users.follow', ['name' => $user->name]) }}">
                    </follow-button>
                    @endif

                    @if( Auth::id() === $user->id )
                    <!-- dropdown -->
                    <div class="ml-auto card-text">
                        <div class="dropdown">

                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <button type="button" class="btn btn-link text-muted m-0 p-2">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">

                                <a class="dropdown-item text-dark" href="{{ route('users.edit', ["name" => Auth::user()->name]) }}">
                                    プロフィールを変更する
                                    <i class="fas fa-edit ml-1"></i>
                                </a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item text-dark" href="/">
                                    投稿一覧へ戻る　　　　
                                    <i class="fas fa-arrow-circle-left text-dark"></i>
                                </a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item text-danger" data-toggle="modal" data-target="">
                                    アカウントを退会する　
                                    <i class="fas fa-user-alt-slash"></i>
                                </a>

                            </div>
                        </div>
                    </div>
                    <!-- dropdown -->

                    <!-- modal -->
                    <div id="" class="modal fade" tabindex="-1" role="dialog">
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

                                <form method="POST" action="">
                                    @csrf
                                    @method('DELETE')

                                    <div class="modal-body">

                                    </div>

                                    <div class="modal-body text-danger">
                                        <i class="far fa-hand-point-up mr-1" style="font-size: 18px"></i>
                                        本当に退会してもよろしいですか？
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

                <!--ユーザー名-->
                <h2 class="card-title m-0">
                    <a href="{{ route('users.show', ['name' => $user->name]) }}" class="text-dark">
                        {{ $user->name }}
                    </a>
                </h2>

            </div>

            <!--フォロー数カウント-->
            <div class="card-body">
                <div class="card-text">

                    <a href="{{ route('users.followings', ['name' => $user->name]) }}" class="text-muted mr-2">
                        {{ $user->count_followings }}フォロー中
                    </a>

                    <a href="{{ route('users.followers', ['name' => $user->name]) }}" class="text-muted">
                        {{ $user->count_followers }}フォロワー
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
