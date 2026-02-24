@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

<a href="{{ url('/item/' . $item->id) }}" class="card-link">
        <div class="form-group">
            <label>ユーザー名</label>
            <input type="text" name="name" value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label>郵便番号</label>
            <input type="text" name="post_code" value="{{ $user->post_code }}">
            </div>
        
        <div class="form-group">
            <label>住所</label>
            <input type="text" name="address" value="{{ $user->address }}">
        </div>
        
        <div class="form-group">
            <label>建物名</label>
            <input type="text" name="building" value="{{ $user->building }}">
        </div>    
        
        <button type="submit">更新</button>
    </form>
</div>
@endsection