@extends('layouts.logout')

@section('content')
    <div id="container">
        <h2>新規ユーザー登録</h2>

        <form method="post" action="{{ route('users.register') }}" id="form-wrapper">
            @csrf

            <div class="form-group">
                <label>
                    <p>UserName</p>
                    <input type="text" name="username" value="{{ old('username') }}">
                </label>
                @error('username')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>
                    <p>MailAdress</p>
                    <input type="email" name="mail" value="{{ old('mail') }}">
                </label>
                @error('mail')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>
                    <p>Password</p>
                    <input type="password" name="password">
                </label>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>
                    <p>Password confirm</p>
                    <input type="password" name="password_confirmation">
                </label>
                @error('password_confirmation')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-button">
                <input type="submit" value="REGISTER">
            </div>

        </form>

        <p><a href="/login">ログイン画面へ戻る</a></p>
    </div>
@endsection
