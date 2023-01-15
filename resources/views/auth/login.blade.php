@extends('layouts.logout')

@section('content')
    <p>Social Network Service</p>

    <div id="container">
        <p>DAWNSNSへようこそ</p>
        <form action="">
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
                <input type="submit" value="LOGIN">
            </div>
        </form>

        <p><a href="{{ route('show.register') }}">新規ユーザーの方はこちら</a></p>
    </div>
@endsection
