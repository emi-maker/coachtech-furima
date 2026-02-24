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

        return redirect()->route('mypage');
    }

    public function index()
    {
        $user = auth()->user();

        $items = $user->items; // ← 出品した商品取得

        return view('mypage.index', compact('user' , 'items'));
    }
}
