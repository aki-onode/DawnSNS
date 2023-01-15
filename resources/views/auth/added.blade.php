@extends('layouts.logout')

@section('content')
    <div id="container">
        <div class="message-wrapper">
            <p>{{ $username }}さん</p>
            <p>ようこそ！DAWNSNSへ</p>
        </div>
        <div class="message-wrapper">
            <p>ユーザー登録が完了しました。</p>
            <p>さっそく、ログインをしてみましょう</p>
        </div>

        <div class="back-button">
            <a href="{{ route('show.login') }}">ログイン画面へ</a>
        </div>
    </div>
@endsection
