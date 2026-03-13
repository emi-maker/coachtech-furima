@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
<div class="sell-wrapper">
    <h1 class="sell-title">商品の出品</h1>

    <form method="POST" action="/sell" enctype="multipart/form-data">
        @csrf

        <div class="sell-section">
            <h2 class="section-title">商品画像</h2>
            <div class="image-upload-area">
                <label class="image-upload-inner">
                @error('img')
                <div style="color:red;">{{ $message }}</div>
                @enderror   
                画像を選択する
                <input type="file" name="img" accept="image/*" hidden>
                </label>
            </div>
        </div>

        <div class="sell-section">
            <h2 class="section-title section-border">商品の詳細</h2>

            <div class="form-group category-row">
                <label>カテゴリー</label>
                @error('categories')
                <div style="color:red;margin-bottom:10px;">{{ $message }}</div>
                @enderror
                <div class="category-group">
                    @foreach($categories as $category)
                    <label class="category-label">

                        <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                        <span>{{ $category->content }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label>商品の状態</label>
                @error('status_id')
                <div style="color:red;">{{ $message }}</div>
                @enderror
                <select name="status_id" class="form-control">
                    <option value="">選択してください</option>
                    @foreach($statuses as $status)
                    <option value="{{ $status->id }}">
                        {{ $status->content }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="sell-section">
            <h2 class="section-title section-border">商品名と説明</h2>

            <div class="form-group">
                <label>商品名</label>
                @error('name')
                <div style="color:red;">{{ $message }}</div>
                @enderror
                <input type="text" name="name" value="{{ old('name') }}">
            </div>
        

            <div class="form-group">
                <label>ブランド名</label>
                <input type="text" name="brand">
            </div>

            <div class="form-group">
                <label>商品の説明</label>
                @error('description')
                <div style="color:red;">{{ $message }}</div>
                @enderror
                <textarea name="description" class="comment-textarea" rows="5"></textarea>
            </div>

            <div class="form-group">
                <label>販売価格</label>
                @error('price')
                <div style="color:red;">{{ $message }}</div>
                @enderror
                <div class="price-input">
                    <span>¥</span>
                    <input type="number" name="price">
                </div>
            </div>
        </div>
        <button type="submit" class="sell-button">出品する</button>
    </form>
</div>
@endsection