@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
<div class="mypage-card">
    <h1>プロフィール設定</h1>

    <form method="POST" action="/mypage/edit" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="profile-image-area">

            <div class="profile-image-circle">
                @if($user->profile_image)
                    <img src="{{ asset('storage/' . $user->profile_image) }}"class="profile-image">
                @endif
            </div>

            <label class="image-select-btn">
                画像を選択する
                <input type="file" name="profile_image" hidden>
            </label>
        </div>
        
        <div class="form-group">
            <label>ユーザー名</label>
            <input type="text" name="name" value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label>郵便番号</label>
            <input type="text" name="post_code" value="{{ $user->post_code }}">
            </div>
        
        <div class="form-group">
            <label>住所</label>
            <input type="text" name="address" value="{{ $user->address }}">
        </div>
        
        <div class="form-group">
            <label>建物名</label>
            <input type="text" name="building" value="{{ $user->building }}">
        </div>    
        
        <button type="submit">更新</button>
    </form>
</div>
@endsection