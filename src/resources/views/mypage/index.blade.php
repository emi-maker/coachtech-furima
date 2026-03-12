@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')

<div class="mypage">

    @include('components.profile-header')

    <div class="tab-menu">
        <a href="/mypage?tab=sell" class="mypage-tab {{ $tab === 'sell' ? 'active' : '' }}">
            出品した商品
        </a>

        <a href="/mypage?tab=buy" class="mypage-tab {{ $tab === 'buy' ? 'active' : '' }}">
            購入した商品
        </a>
    </div>

    <div class="tab-content">

        @if($tab === 'sell')
        <div class="row">
            @foreach($sellItems as $item)
            <div class="col-md-3">
                <div class="card">
                    <a href="/item/{{ $item->id }}" class="card-link">

                        <div class="card-image">
                            @if($item->img)
                            @if(str_starts_with($item->img,'http'))
                            <img src="{{ $item->img }}">
                            @else
                            <img src="{{ asset('storage/' . $item->img) }}">
                            @endif
                            @endif
                        </div>

                        <div class="card-body">
                            <p>{{ $item->name }}</p>
                        </div>

                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @endif


        @if($tab === 'buy')
        <div class="row">
            @foreach($buyItems as $item)
            <div class="col-md-3">
                <div class="card">
                    <a href="/item/{{ $item->id }}" class="card-link">

                        <div class="card-image">
                            @if($item->img)

                            @if(str_starts_with($item->img,'http'))
                            <img src="{{ $item->img }}">
                            @else
                            <img src="{{ asset('storage/' . $item->img) }}">
                            @endif

                            @endif
                        </div>

                        <div class="card-body">
                            <p>{{ $item->name }}</p>
                        </div>

                    </a>
                </div>
            </div>
            @endforeach
        </div>
        @endif

    </div>

</div>

@endsection