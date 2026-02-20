@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<div class="auth-card">
    <h1>ログイン</h1>

    <form method="POST" action="/login">
        @csrf
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

        <button type="submit">ログイン</button>
    </form>

    <p class="register-link">
        <a href="/register">新規登録はこちら</a>
    </p>
</div>
@endsection