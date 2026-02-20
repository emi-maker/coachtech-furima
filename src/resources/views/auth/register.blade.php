@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<div class="auth-card">
    <h1>会員登録</h1>
<form method="POST" action="/register">
    @csrf
    <div class="form-group">
        <label>ユーザー名</label>

        @error('name')
            <div style="color:red;">{{ $message }}</div>
        @enderror   
        <input type="text" name="name" value="{{ old('name') }}">    
    </div>
    
    <div class="form-group">
        <label>メールアドレス</label>

        @error('email')
            <div style="color:red;">{{ $message }}</div>
        @enderror
        <input type="email" name="email" value="{{ old('email') }}">
    </div>
    
    <div class="form-group">
        <label>パスワード</label>

        @error('password')
            <div style="color:red;">{{ $message }}</div>
        @enderror
        <input type="password" name="password">
    </div>
    
    <div class="form-group">
        <label>確認用パスワード</label>

        @error('password')
        <div style="color:red;">{{ $message }}</div>
        @enderror
        <input type="password" name="password_confirmation">
    </div>
    
    <button type="submit">登録する</button>
</form>
<p class="login-link">
    <a href="/login">ログインはこちら</a>
    </p>
</div>
@endsection