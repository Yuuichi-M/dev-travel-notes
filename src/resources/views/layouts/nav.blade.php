<nav class="navbar navbar-expand nabvar-light navbar-fixed-top shadow-none">

    <a class="navbar-brand text-dark mt-2 mb-2 font-weight-bold" href="/">
        <i class="fas fa-torii-gate ml-1 text-danger"></i>
        {{ config('app.name') }}
        <i class="fas fa-torii-gate text-dark"></i>
    </a>

    <ul class="navbar-nav ml-auto">

        <!-- Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bars"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                <button class="dropdown-item text-dark" type="button" onclick="location.href=''">
                    ユーザー登録
                </button>
                <div class="dropdown-divider"></div>
                <button class="dropdown-item text-dark" type="button" onclick="location.href=''">
                    ログイン
                </button>
                <div class="dropdown-divider"></div>
                <button class="dropdown-item text-dark" type="button" onclick="location.href=''">
                    投稿する
                </button>
                <div class="dropdown-divider"></div>
                <button class="dropdown-item text-dark" type="button" onclick="location.href=''">
                    マイページ
                </button>
                <div class="dropdown-divider"></div>
                <form class="form-inline ml-auto pl-4">
                    <input type="text" class="form-control" type="search" placeholder="検索" aria-label="Search">
                    <span class="input-group-btn">
                        <button class="btn btn--outline-dark my-2 my-sm-0" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </span>
                </form>
                <div class="dropdown-divider"></div>
                <button form="logout-button" class="dropdown-item text-dark" type="submit">
                    ログアウト
                </button>
            </div>
        </li>
        <form id="logout-button" method="POST" action="{{ route('logout') }}">
            @csrf
        </form>
        <!-- Dropdown -->

    </ul>

</nav>
