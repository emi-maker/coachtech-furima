<h2>配送先変更</h2>

<form method="POST" action="{{ route('purchase.address.update', $itemId) }}">
    @csrf

    <label>郵便番号</label>
    <input type="text" name="postal_code">

    <label>住所</label>
    <input type="text" name="address">

    <button type="submit">変更する</button>
</form>