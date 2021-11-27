<nav class="navbar navbar-expand-md navbar-fixed-top shadow-sm">

    <a class="navbar-brand font-weight-bold deep-orange-text ml-2" title="ホーム" href="/">
        <i class="fas fa-shoe-prints mr-1" style="font-size: 20px"></i>
        {{ config('app.name') }}
    </a>

    <button class="navbar-toggler mt-2" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        @if (!empty($user->avatar_file_name))
        <img src="/storage/avatars/{{$user->avatar_file_name}}" class="rounded-circle" style="object-fit: cover; width: 35px; height: 35px;">
        @else
        <img src="/images/avatar-default.svg" class="rounded-circle" style="object-fit: cover; width: 35px; height: 35px;">
        @endif
        {{ $user->name }} <span class="caret"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">

            @if(Auth::check())

            <li class="nav-item">
                <a class="nav-link deep-orange-text" href="{{ route('articles.create') }}">投稿</a>
            </li>
            <li class="nav-item">
                <a class="nav-link deep-orange-text" href="{{ route("users.show", ["name" => Auth::user()->name]) }}">マイページ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link deep-orange-text" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-button').submit();">ログアウト</a>
                <form id="logout-button" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
            </li>

            @else

            <li class="nav-item">
                <a class="nav-link deep-orange-text" href="{{ route('register') }}">アカウント作成</a>
            </li>
            <li class="nav-item">
                <a class="nav-link deep-orange-text" href="{{ route('login') }}">ログイン</a>
            </li>
            <li class="nav-item">
                <a class="nav-link deep-orange-text" href="">ゲストログイン</a>
            </li>

            @endif
        </ul>

        <!-- @guest
            <li class="nav-item mt-2">
                <h4><a class="nav-link" title="サインアップ" href=" {{ route('register') }}"><i class="fas fa-user-alt deep-orange-text"></i></a></h4>
            </li>
            @endguest

            @guest
            <li class="nav-item mt-2">
                <h4><a class="nav-link" title="サインイン" href="{{ route('login') }}"><i class="fas fa-sign-in-alt deep-orange-text"></i></a></h4>
            </li>
            @endguest

            @auth
            <li class="nav-item mt-2">
                <h4><a class="nav-link" title="マイページ" href="{{ route("users.show", ["name" => Auth::user()->name]) }}"><i class="fas fa-user-circle deep-orange-text"></i></a></h4>
            </li>
            @endauth

            @auth
            <li class="nav-item mt-2 mr-1">
                <h4><a class="nav-link" title="投稿" href="{{ route('articles.create') }}"><i class="fas fa-paper-plane deep-orange-text"></i></a></h4>
            </li>
            @endauth

            @auth

            <li class="nav-item dropdown mt-1">

                <a class="nav-link" title="メニュー" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <h2><i class="fas fa-bars deep-orange-text"></i></h2>
                </a>

                <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">

                    <button class="dropdown-item" type="button" onclick="location.href='{{ route("users.show", ["name" => Auth::user()->name]) }}'">
                        マイページ
                        <i class="fas fa-user-circle ml-1"></i>
                    </button>

                    <div class="dropdown-divider"></div>

                    <button form="logout-button" class="dropdown-item text-danger" type="submit">
                        ログアウト
                        <i class="fas fa-sign-out-alt ml-1"></i>
                    </button>

                </div>
            </li>

            <form id="logout-button" method="POST" action="{{ route('logout') }}">
                @csrf
            </form>

            @endauth

        </ul> -->
    </div>

</nav>
