<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MypageController extends Controller
{
    //編集画面表示・ログインしてる人を取る
    public function edit()
    {
        $user = Auth::user();

        return view('mypage.edit', compact('user'));
    }

    // 更新処理
    public function update(Request $request)
    {
        $user = auth()->user();
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'post_code' => $request->post_code,
            'address' => $request->address,
            'building' => $request->building,
        ]);

        if ($request->hasFile('profile_image')) {
        $path = $request->file('profile_image')
            ->store('profile_images', 'public');

        $user->profile_image = $path;
        $user->save();
    }

        return redirect('/');
    }

    public function index(Request $request)
    {
    $user = auth()->user();

    // 今どのタブ？
    $tab = $request->tab ?? 'sell';

    // 出品した商品
    $sellItems = $user->items;

    // 購入した商品
    $buyItems = \App\Models\Item::where('buyer_id', $user->id)->get();

    return view('mypage.index', compact(
        'user',
        'tab',
        'sellItems',
        'buyItems'
    ));
    }
}