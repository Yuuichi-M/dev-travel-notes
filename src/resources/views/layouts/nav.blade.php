<nav class="navbar navbar-expand nabvar-light navbar-fixed-top shadow-sm">

    <a class="navbar-brand text-dark font-weight-bold ml-3" title="ホーム" href="/">
        <i class="fas fa-torii-gate deep-orange-text" style="font-size: 21px"></i>
        <span class="text-dark" style="font-size: 21px">{{ config('app.name') }}</span>
    </a>

    <ul class="navbar-nav ml-auto">

        @guest
        <li class="nav-item mt-2">
            <h4><a class="nav-link" title="アカウント作成" href=" {{ route('register') }}"><i class="fas fa-user-edit text-dark"></i></a></h4>
        </li>
        @endguest

        @guest
        <li class="nav-item mt-2">
            <h4><a class="nav-link" title="ログイン" href="{{ route('login') }}"><i class="fas fa-sign-in-alt text-dark"></i></a></h4>
        </li>
        @endguest

        @auth
        <li class="nav-item mt-2">
            <h4><a class="nav-link" title="マイページ" href=""><i class="fas fa-user-circle text-dark"></i></a></h4>
        </li>
        @endauth

        @auth
        <li class="nav-item mt-2">
            <h4><a class="nav-link" title="投稿" href="{{ route('articles.create') }}"><i class="fas fa-pen text-dark"></i></a></h4>
        </li>
        @endauth

        <!-- Dropdown -->
        <li class="nav-item dropdown mt-1">

            <a class="nav-link" title="メニュー" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <h2><i class="fas fa-bars deep-orange-text"></i></h2>
            </a>

            <div class="dropdown-menu dropdown-menu-right dropdown-primary " aria-labelledby="navbarDropdownMenuLink">

                @guest
                <a class="dropdown-item text-dark ml-3 mt-1" type="button" href="{{ route('register') }}">
                    アカウント作成
                </a>
                @endguest

                @guest
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-dark ml-3 mt-1" type="button" href="{{ route('login') }}">
                    ログイン
                </a>
                @endguest

                @auth
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-dark ml-3 mt-1" type="button" href="{{ route('articles.create') }}">
                    投稿
                </a>
                @endauth

                @auth
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-dark ml-3 mt-1" type="button" href="">
                    マイページ
                </a>
                @endauth

                <!--
                <div class="dropdown-divider"></div>
                <form class="form-inline ml-auto pl-4">
                    <input type="text" class="form-control" type="search" placeholder="検索" aria-label="Search">
                    <span class="input-group-btn">
                        <button class="btn btn--outline-dark my-2 my-sm-0" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </span>
                </form>
                -->

                @auth
                <div class="dropdown-divider"></div>
                <button form="logout-button" class="dropdown-item text-danger mt-3 mb-2" type="submit">
                    ログアウト
                </button>
                @endauth

            </div>
        </li>

        <form id="logout-button" method="POST" action="{{ route('logout') }}">
            @csrf
        </form>
        <!-- Dropdown -->

    </ul>

</nav>
