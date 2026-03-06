@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@section('content')
<!--商品一覧/認証/未認証でも見れる -->
<div class="tab-menu">
    <a href="/?keyword={{ request ('keyword') }}" class="item-tab {{ request('tab') !== 'mylist' ? 'active' : '' }}">
        おすすめ
    </a>

    <a href="/?tab=mylist&keyword={{ request('keyword') }}" class="item-tab {{ request('tab') === 'mylist' ? 'active' : '' }}">
        マイリスト
    </a>
</div>

<div class="row">
    @foreach($items as $item)
    <div class="col-md-3">
        <div class="card">
            <a href="/item/{{ $item->id }}" class="card-link">
                <div class="card-image">
                   @if($item->img)
                        @if(str_starts_with($item->img, 'http'))
                        <img src="{{ $item->img }}">
                        @else
                            <img src="{{ asset('storage/' . $item->img) }}">
                        @endif
                    @endif

                    @if($item->buyer_id)
                    <span class="sold-label">Sold</span>
                    @endif
                </div>
                <div class="card-name">{{ $item->name }}
                </div>
            </a>
        </div>
    </div>
    @endforeach
</div>

@endsection