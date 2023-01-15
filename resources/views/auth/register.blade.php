@extends('layouts.logout')

@section('content')
    <h2>新規ユーザー登録</h2>

    <form action="post" action="{{ route('auth.register') }}" id="form-wrapper">
        @csrf

        <div class="form-group">
            <label>
                <p>UserName</p>
                <input type="text" id="username">
            </label>
        </div>
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
        <div class="form-group">
            <label>
                <p>Password confirm</p>
                <input type="password">
            </label>
        </div>
        <div class="form-button">
            <input type="submit" value="REGISTER">
        </div>
    </form>

    <p><a href="/login">ログイン画面へ戻る</a></p>
@endsection
