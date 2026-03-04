@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/address.css') }}">
@endsection

@section('content')

<div class="address-container">

    <h1 class="address-title">住所変更</h1>

    <form class="addres-form" method="POST" action="/purchase/{{ $item->id }}/address">
        @csrf
        @method('PATCH') 

        <div class="form-group">
            <label class="form-label">郵便番号</label>
            <input type="text" name="post_code" class="form-input">
        </div>

        <div class="form-group">
            <label class="form-label">住所</label>
            <input type="text" name="address" class="form-input">
        </div>

        <div class="form-group">
            <label class="form-label">建物名</label>
            <input type="text" name="building" class="form-input">
        </div>

        <button type="submit" class="address-button">変更する</button>
    </form>
</div>
@endsection