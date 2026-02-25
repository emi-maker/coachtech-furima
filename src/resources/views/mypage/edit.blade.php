@extends('layouts.app')

{{-- ページ専用CSS --}}
@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection


@section('content')

{{-- 編集エリア --}}
<div class="mypage-card">

    <h1 class="mypage-title">プロフィール設定</h1>
    
    <form action="/mypage/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
    
        {{-- 現在のプロフィール画像 --}}
        <div class="profile-image-area">
            <img src="{{ asset('storage/' . $user->profile_image) }}" class="profile-image">
    
            {{-- 画像変更 --}}
            <label class="image-select-btn">
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