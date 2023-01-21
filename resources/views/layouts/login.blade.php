<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header>
        <div id="logo-wrapper">
            <div class="header-logo">
                <a href="{{ route('user.home') }}">
                    <img class="header-img" src="{{ asset('images/main_logo.png') }}">
                </a>
            </div>
        </div>
        <div id="nav-wrapper">
            <div id="nav-items">
                <div id="user-items">
                    <p>{{ Auth::user()->username }} さん<span class="ac-open">&or;</span></p>
                    <img src="images/{{ Auth::user()->image }}" width="35" height="35">
                </div>
            </div>
            <div id="menu-items">
                <ul>
                    <li class="menu-item"><a href="/top">ホーム</a></li>
                    <li class="menu-item"><a href="/profile">プロフィール</a></li>
                    <li class="menu-item"><a href="{{ route('user.logout') }}">ログアウト</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div>
        <div id="side-bar">
            <div id="confirm">
                <p>〇〇さんの</p>
                <div>
                    <p>フォロー数</p>
                    <p>〇〇名</p>
                </div>
                <p class="btn"><a href="">フォローリスト</a></p>
                <div>
                    <p>フォロワー数</p>
                    <p>〇〇名</p>
                </div>
                <p class="btn"><a href="">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
