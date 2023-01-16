@extends('layouts.logout')

@section('content')
    <div id="logout-wrapper">
        <div class="create-text">
            <h2>新規ユーザー登録</h2>
        </div>
        <div class="form-wrapper">
            <form method="post" action="{{ route('users.register') }}" id="form-wrapper">
                @csrf

                <div class="form-group">
                    <label>
                        <p>UserName</p>
                        <input type="text" name="username" value="{{ old('username') }}">
                    </label>
                    @error('username')
                        <div>
                            <strong class="error">{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>
                        <p>MailAdress</p>
                        <input type="email" name="mail" value="{{ old('mail') }}">
                    </label>
                    @error('mail')
                        <div>
                            <strong class="error">{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>
                        <p>Password</p>
                        <input type="password" name="password">
                    </label>
                    @error('password')
                        <div>
                            <strong class="error">{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>
                        <p>Password confirm</p>
                        <input type="password" name="password_confirmation">
                    </label>
                    @error('password_confirmation')
                        <div>
                            <strong class="error">{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="form-button">
                    <input type="submit" value="REGISTER" class="create-button">
                </div>

            </form>
        </div>
        <div class="back-login">
            <a href="/login">ログイン画面へ戻る</a>
        </div>
    </div>
@endsection
