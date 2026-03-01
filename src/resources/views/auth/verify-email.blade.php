@extends('layouts.app')

@section('content')

<h2>メール認証をしてください</h2>

<p>
    登録したメールアドレスに認証リンクを送信しました。
    メールのURLをクリックしてください。
</p>

<form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button type="submit">
        認証メールを再送する
    </button>
</form>

@endsection