@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')

<div class="purchase-container">
    <form action="{{ route('purchase.store') }}" method="POST">
        @csrf
        <input type="hidden" name="item_id" value="{{ $item->id }}">
        <input type="hidden" name="payment_method" id="hidden-payment">

        <div class="purchase-container">

            {{-- 左 --}}
            <div class="purchase-left">

                <div class="purchase-item">

                    <div class="purchase-image">
                        @if($item->img)
                        @if(str_starts_with($item->img,'http'))
                        <img src="{{ $item->img }}">
                        @else
                        <img src="{{ asset('storage/' . $item->img) }}">
                        @endif
                        @endif
                    </div>

                    <div class="purchase-info">
                        <h2>{{ $item->name }}</h2>
                        <p>¥{{ number_format($item->price) }}</p>
                    </div>

                </div>

                <div class="purchase-section">
                    <label>支払い方法</label>

                    <select id="payment-select">
                        <option value="">選択してください</option>
                        <option value="convenience">コンビニ支払い</option>
                        <option value="card">カード支払い</option>
                    </select>
                </div>

                <div class="purchase-section">
                    <label>配送先</label>
                    <p>
                        〒 {{ session('shipping_postcode') ?? auth()->user()->postal_code }}
                    </p>
                    <p>
                        {{ session('shipping_address') ?? auth()->user()->address }}
                    </p>
                </div>

                <a href="{{ route('purchase.address.edit', $item->id) }}">
                    送付先を変更する
                </a>
                <form action="{{ route('purchase.store', $item->id) }}" method="POST">
                    @csrf

            </div>

            {{-- 右 --}}
            <div class="purchase-right">

                <div class="summary-box">
                    <div class="summary-row">
                        <p>商品代金 ¥{{ number_format($item->price) }}</p>
                    </div>

                    <div class="summary-row">
                        <span class="payment-label">支払い方法</span>
                        <span id="payment-display">未選択</span>
                    </div>
                </div>

                <button type="submit" class="purchase-button">
                    購入する
                </button>
    </form>
</div>
</div>

</form>

<script>
    document.addEventListener("DOMContentLoaded", function () {

    const select = document.getElementById("payment-select");
    const display = document.getElementById("payment-display");
    const hidden = document.getElementById("hidden-payment");

    select.addEventListener("change", function () {

        hidden.value = this.value;

        if (this.value === "convenience") {
            display.textContent = "コンビニ支払い";
        } else if (this.value === "card") {
            display.textContent = "カード支払い";
        } else {
            display.textContent = "未選択";
        }

    });

});
</script>

@endsection