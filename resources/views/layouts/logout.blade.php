<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>DAWN-SNS</title>
    <link rel="stylesheet" href="{{ url('css/reset.css') }}">
    <link rel="stylesheet" href="{{ url('css/logout.css') }}">
</head>

<body>
    <header>
        <div class="header-logo">
            <img src="{{ url('images/main_logo.png') }}">
        </div>
    </header>

    <div id="container">
        @yield('content')
    </div>
</body>

</html>
