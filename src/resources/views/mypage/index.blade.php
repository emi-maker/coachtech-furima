@extends('layouts.app')

@section('content')

<div class="mypage">

    @include('components.profile-header')

    <div class="mypage-items">
        <h2>出品した商品</h2>

            @foreach ($items as $item)
                <div class="item-card">
                        <a href="{{ url('/item/' . $item->id) }}" class="card-link">
                        <img src="{{ asset('storage/' . $item->img) }}">
                    <p>{{ $item->name }}</p>
                        </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection