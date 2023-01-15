@extends('layouts.logout')

@section('content')
    <div class="title">
        <p>Social Network Service</p>
    </div>

    <div id="logout-wrapper">
        <div class="welcome-text">
            <p>DAWNSNSへようこそ</p>
        </div>

        <div class="form-wrapper">
            <form action="" class="">
                @csrf

                <div class="form-group">
                    <label>
                        <p>MailAdress</p>
                        <input type="email">
                    </label>
                </div>
                <div class="form-group">
                    <label>
                        <p>Password</p>
                        <input type="password">
                    </label>
                </div>
                <div class="form-button">
                    <input type="submit" value="LOGIN" class="login-button">
                </div>
            </form>
        </div>

        <div class="create-users">
            <a href="{{ route('show.register') }}">新規ユーザーの方はこちら</a>
        </div>
    </div>
@endsection
