<a href="{{ url('/item/' . $item->id) }}" class="card-link">

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

    <div class="card-name">
        {{ $item->name }}
    </div>

</a>