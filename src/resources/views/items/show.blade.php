@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')
<div class="item-detail">
    <div class="item-image">
        @if (str_starts_with($item->img, 'http'))
        <img src="{{ $item->img }}">
        @else
        <img src="{{ asset('storage/' . $item->img) }}">
        @endif
    </div>

    <div class="item-info">
        <h1 class="item-name">{{ $item->name }}</h1>
        <p>{{ $item->brand }}</p>
        <P class="item-price">¥{{ $item->price }}<span class="tax">（税込）</span></P>
        <div class="reaction-area">
            <div class="item-actions">
                @auth
                <form method="POST" action="{{ route('items.favorite', $item) }}">
                    @csrf
                    <button type="submit" style="border:none; background:none;">
                        <div class="favorite-area">
                            @if($isFavorite)
                            <img src="{{ asset('img/ハートロゴ_ピンク.png') }}" alt="いいね">
                            @else
                            <img src="{{ asset('img/ハートロゴ_デフォルト.png') }}" alt="いいね">
                            @endif
                            <div class="favorite-count">
                                {{ $item->favorited_users_count }}
                            </div>
                        </div>
                    </button>
                </form>
                @else
                <img src="{{ asset('img/ハートロゴ_デフォルト.png') }}" alt="いいね">
                @endauth

                <div class="comment-area">
                    <img src="{{ asset('img/ふきだしロゴ.png') }}" alt="コメント">
                    <div class="comment-count">
                        {{ $item->comments_count }}
                    </div>
                </div>
            </div>
            <a href="{{ route('purchase.create', $item->id) }}" class="buy-button">
                購入手続き
            </a>
            <!-- ② 商品説明 -->
            <div class="item-description-block">
                <h2>商品説明</h2>
                <p class="item-description">{{ $item->description }}</p>
            </div>

            <!-- ③ 商品情報 -->
            <div class="item-info-block">
                <h2>商品情報</h2>

                <p>
                    <strong>カテゴリー：</strong>
                    @foreach($item->categories as $category)
                    <span>{{ $category->content }}</span>
                    @endforeach
                </p>

                <p>
                    <strong>商品の状態：</strong>
                    {{ optional($item->status)->content }}
                </p>
            </div>

            <!-- ④ コメント -->
            <div class="item-comment-block">
                <h2>コメント({{ $item->comments_count }})</h2>
                @foreach($item->comments as $comment)
                <div class="comment-item">
                    <div class="comment-user-area">
                        <div class="user-icon">
                        <img src="{{ asset('storage/' . $comment->user->profile_image) }}">
                        </div>
                        <span class="user-name">
                            {{ $comment->user->name ?? 'ユーザー' }}
                        </span>
                    </div>
                    <div class="comment-content">
                        {{ $comment->content }}
                    </div>
                </div>
                @endforeach

                <!-- 入力エリア -->
                <div class="comment-form-area">
                    <h3 class="comment-form-title">商品へのコメント</h3>
                    <form action="{{ route('comments.store', $item->id) }}" method="POST">
                        @csrf
                        <textarea name="content" class="comment-textarea" rows="5"></textarea>
                        <button type="submit" class="comment-submit">コメントを送信する</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection