<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() 
    {
        return view('login.index');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'email:required|string|email|max:255',
            'password:required|string|min:4'
        ]);

        if(!Auth::attempt($request->only('email', 'password'))) {
            return back()->withErrors([
                'email' => 'Пользователь не найден',
            ])->withInput();
        } 
        
        $request->session()->regenerate();
        return redirect()->intended('/');
    }

    public function logout(Request $request) 
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Вы успешно вышли');
    }
}
