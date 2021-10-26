<nav class="navbar navbar-expand nabvar-light navbar-fixed-top shadow-sm">

    <a class="navbar-brand text-dark font-weight-bold ml-2" title="ホーム" href="/">
        <i class="fas fa-shoe-prints deep-orange-text" style="font-size: 23px"></i>
        <span class="deep-orange-text" style="font-size: 20px">{{ config('app.name') }}</span>
    </a>

    <ul class="navbar-nav ml-auto">

        @guest
        <li class="nav-item mt-2">
            <h4><a class="nav-link" title="アカウント作成" href=" {{ route('register') }}"><i class="fas fa-user-edit deep-orange-text"></i></a></h4>
        </li>
        @endguest

        @guest
        <li class="nav-item mt-2">
            <h4><a class="nav-link" title="ログイン" href="{{ route('login') }}"><i class="fas fa-sign-in-alt deep-orange-text"></i></a></h4>
        </li>
        @endguest

        @auth
        <li class="nav-item mt-2">
            <h4><a class="nav-link" title="マイページ" href="{{ route("users.show", ["name" => Auth::user()->name]) }}"><i class="fas fa-address-book deep-orange-text"></i></a></h4>
        </li>
        @endauth

        @auth
        <li class="nav-item mt-2">
            <h4><a class="nav-link" title="投稿" href="{{ route('articles.create') }}"><i class="fas fa-paper-plane deep-orange-text"></i></a></h4>
        </li>
        @endauth

        @auth
        <!-- Dropdown -->
        <li class="nav-item dropdown mt-1">

            <a class="nav-link" title="メニュー" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <h2><i class="fas fa-bars deep-orange-text"></i></h2>
            </a>

            <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">

                <button class="dropdown-item" type="button" onclick="location.href='{{ route("users.show", ["name" => Auth::user()->name]) }}'">
                    マイページ
                </button>

                <div class="dropdown-divider"></div>

                <button form="logout-button" class="dropdown-item" type="submit">
                    ログアウト
                </button>

            </div>
        </li>

        <form id="logout-button" method="POST" action="{{ route('logout') }}">
            @csrf
        </form>
        <!-- Dropdown -->
        @endauth

    </ul>

</nav>
