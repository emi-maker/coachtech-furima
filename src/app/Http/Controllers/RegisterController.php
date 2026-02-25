<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
     public function store(RegisterRequest $request)
    {
        $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        ]);

        //登録した瞬間ログイン
        Auth::login($user);

        //初回プロフィールへ
        return redirect()->route('mypage.profile.edit');
        
    }

    public function create()
    {
        return view('auth.register');
    }
}
