<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DAWN-SNS</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
                    <li class="menu-item"><a href="{{ route('user.home') }}">HOME</a></li>
                    <li class="menu-item"><a href="/profile">プロフィール編集</a></li>
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
            <div id="confirm-wrapper">
                <div class="confirm-items">
                    <p>{{ Auth::user()->username }}さんの</p>
                    <div class="follow-count">
                        <p>　フォロー数</p>
                        <p>{{ $followCount }}名</p>
                    </div>
                    <div class="button-wrapper">
                        <button class="side-button">
                            <a href="{{ route('follows.list') }}">フォローリスト</a>
                        </button>
                    </div>

                </div>
                <div class="confirm-items">
                    <div class="follow-count">
                        <p>　フォロワー数</p>
                        <p>{{ $followerCount }}名</p>
                    </div>
                    <div class="button-wrapper">
                        <button class="side-button">
                            <a href="{{ route('followers.list') }}">フォロワーリスト</a>
                        </button>
                    </div>

                </div>
            </div>
            <div id="serch-wrapper">
                <button class="side-button">
                    <a href="">ユーザー検索</a>
                </button>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
