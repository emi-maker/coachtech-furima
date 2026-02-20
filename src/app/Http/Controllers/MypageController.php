<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypageController extends Controller
{
    //編集画面表示・ログインしてる人を取る
    public function edit()
    {
        $user = auth()->user();

        return view('mypage.profile', compact('user'));
    }

    // 更新処理
    public function update(Request $request)
    {
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('mypage.profile.edit');
    }

    public function index()
    {
        $user = auth()->user();

        return view('mypage.index', compact('user'));
    }
}
