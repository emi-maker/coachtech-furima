@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')

<div class="mypage">

    @include('components.profile-header')

    <div class="mypage-container">

        <div class="tab-menu">
            <a href="{{ route('mypage', ['tab' => 'sell']) }}" class="{{ $tab === 'sell' ? 'active-tab' : '' }}">
            出品した商品
        </a>
        
        <a href="{{ route('mypage', ['tab' => 'buy']) }}" class="{{ $tab === 'buy' ? 'active-tab' : '' }}">
            購入した商品
        </a>
    </div>
    {{-- ★表示エリア --}}
    <div class="tab-content">
        @if($tab === 'sell')
            <div class="row">
                @foreach($sellItems as $item)
                    <div class="col-md-3">
                    @include('components.item-card')
                    </div>
                @endforeach
            </div>
        @endif
        
        @if($tab === 'buy')
        
        <div class="row">
            @foreach($buyItems as $item)
                <div class="col-md-3">
                    @include('components.item-card')
                </div>
            @endforeach
        </div>
        @endif
    </div>    
</div>

</div>

@endsection