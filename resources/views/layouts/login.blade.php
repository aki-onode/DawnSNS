<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="{{ url('css/reset.css') }}">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>

<body>
    <header>
        <div id="head">
            <h1><a><img src="{{ url('images/main_logo.png') }}"></a></h1>
            <div id="">
                <div id="">
                    <p>〇〇さん<img src="images/arrow.png"></p>
                    <div>
                        <ul>
                            <li><a href="/top">ホーム</a></li>
                            <li><a href="/profile">プロフィール</a></li>
                            <li><a href="{{ route('user.logout') }}">ログアウト</a></li>
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
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>

</html>
