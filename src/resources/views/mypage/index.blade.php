@extends('layouts.app')

@section('content')

@include('components.profile-header')

<h2>出品した商品</h2>

@foreach ($items as $item)
<div>
    <img src="{{ asset('storage/' . $item->img) }}" width="150">
    <p>{{ $item->name }}</p>
    </div>
</div>
@endforeach

@endsection