<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
     public function store(RegisterRequest $request)
    {
        User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),

        
        
    ]);

        return redirect('/login');
    }

    public function create()
    {
        return view('auth.register');
    }
}
