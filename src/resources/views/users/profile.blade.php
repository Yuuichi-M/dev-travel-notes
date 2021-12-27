<div class="row justify-content-center">
    <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">

        <div class="row">
            <div class="col-8 offset-2">
                @if (session('status'))
                <div class="alert alert-success mt-4" role="alert">
                    {{ session('status') }}
                </div>
                @endif
            </div>
        </div>

        <div class="card mt-3 shadow-none" style="border-radius: 1rem">
            <div class="card-body">
                <div class="d-flex flex-row">

                    <span class="d-flex align-items-center mr-2" style="text-decoration: none;">
                        @if (!empty($user->avatar_file_name))
                        <img src="{{ asset('https://portfolio-sns-backet.s3.ap-northeast-1.amazonaws.com/avatars/' . $user->avatar_file_name) }}" class="rounded-circle" style="object-fit: cover; width: 55px; height: 55px;">
                        @else
                        <img src="/images/avatar-default.svg" class="rounded-circle" style="object-fit: cover; width: 55px; height: 55px;">
                        @endif
                    </span>

                    <span class="card-title text-dark h3 m-0 d-flex align-items-center">{{ $user->name }}</span>

                    <!--フォローボタン-->
                    @if( Auth::id() !== $user->id )
                    <follow-button class="ml-auto" :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))' :authorized='@json(Auth::check())' endpoint="{{ route('users.follow', ['name' => $user->name]) }}">
                    </follow-button>
                    @endif

                    <!-- dropdown -->
                    @if( Auth::id() === $user->id )
                    <div class="ml-auto card-text">
                        <div class="dropdown">

                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <button type="button" class="btn btn-link text-muted m-0 p-2">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">

                                <a class="dropdown-item text-dark" href="{{ route('users.edit', ["name" => Auth::user()->name]) }}">
                                    <i class="fas fa-edit mr-2"></i>プロフィールを変更する
                                </a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item text-dark" href="/">
                                    <i class="fas fa-arrow-circle-left mr-2"></i>投稿一覧へ戻る　　　　
                                </a>

                                @unless (Auth::id() == 3)

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $user->id }}">
                                    <i class="fas fa-user-alt-slash mr-2"></i>アカウントを退会する　
                                </a>

                                @endunless

                            </div>
                        </div>
                    </div>
                    <!-- dropdown -->

                    <!-- modal -->
                    <div id="modal-delete-{{ $user->id }}" class="modal fade" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header font-weight-bold deep-orange lighten-1 text-center pb-3 pt-3">

                                    <span class="text-white" style="font-size: 18px">
                                        <i class="fas fa-user-alt-slash text-white mr-1" style="font-size: 20px"></i>
                                        Delete Account
                                    </span>

                                    <button type=" button" class="close text-white" data-dismiss="modal" aria-label="閉じる">
                                        <span aria-hidden="true">&times;</span>
                                    </button>

                                </div>

                                <form method="POST" action="{{ route('users.destroy', Auth::user()) }}">
                                    @csrf
                                    @method('DELETE')

                                    <div class="modal-body">
                                        アカウント名 : {{ $user->name }}
                                    </div>

                                    <div class="modal-body text-danger">
                                        <i class="far fa-hand-point-up mr-1" style="font-size: 18px"></i>
                                        本当に退会してもよろしいですか？
                                        <div class="small text-danger">※ 退会するとアカウントや投稿が全て削除されます。</div>
                                    </div>

                                    <div class="modal-footer justify-content-between btn-group">
                                        <button type="button" class="btn btn-light shadow-none" data-dismiss="modal">
                                            <i class="fas fa-backspace mr-1"></i>
                                            キャンセル
                                        </button>

                                        <button type="submit" class="btn btn-danger shadow-none">
                                            <i class="fas fa-user-alt-slash mr-1"></i>
                                            退会する
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- modal -->

                </div>

                <div class="card-text mt-3">
                    {{ $user->self_introduction }}
                </div>

            </div>

            <!--フォロー数カウント-->
            <div class="card-body">
                <div class="card-text">

                    <a href="{{ route('users.followings', ['name' => $user->name]) }}" class="text-dark mr-2">
                        {{ $user->count_followings }} フォロー中
                    </a>

                    <a href="{{ route('users.followers', ['name' => $user->name]) }}" class="text-dark">
                        {{ $user->count_followers }} フォロワー
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
