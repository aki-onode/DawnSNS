@extends('layouts.login')

@section('content')
    <div class="profile-wrapper">
        <div class="profile-image">
            <img src="{{ asset('images/' . $user->image) }}" class="rounded-circle">
        </div>
        <div class="profile-edit-wrapper">
            <form action="{{ route('edit.profile') }}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="profile-form-items">
                    <label>UserName</label>
                    <div class="profile-form">
                        <input type="text" value="{{ $user->username }}" name="username">
                        @error('username')
                            <div>
                                <strong class="error">{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="profile-form-items">
                    <label>MailAdress</label>
                    <div class="profile-form">
                        <input type="email" value="{{ $user->mail }}" name="mail">
                        @error('mail')
                            <div>
                                <strong class="error">{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="profile-form-items">
                    <label>Password</label>
                    <div class="profile-form">
                        <input type="password" value="●●●●●●●" readonly="readonly">
                    </div>
                </div>
                <div class="profile-form-items">
                    <label>new Passoword</label>
                    <div class="profile-form">
                        <input type="password" name="password">
                        @error('password')
                            <div>
                                <strong class="error">{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="profile-form-items">
                    <label>Bio</label>
                    <div class="profile-form">
                        <textarea name="bio">{{ $user->bio }}</textarea>
                        @error('bio')
                            <div>
                                <strong class="error">{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="profile-form-items">
                    <label>Icon Image</label>
                    <div class="profile-form file-deco">
                        <label>
                            <input type="file" name="image">
                            <p class="select-file">ファイルを選択</p>
                        </label>
                        @error('image')
                            <div>
                                <strong class="error">{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="profile-form-items-btn">
                    <input type="submit" value="更新" class="edit-profile-btn">
                </div>
            </form>
        </div>
    </div>
@endsection
