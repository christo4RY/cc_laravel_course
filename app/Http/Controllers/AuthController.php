<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $formData = request()->validate([
            'name' => ['required', 'min:3'],
            'username' => ['required', 'min:6', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:255'],
        ]);
        $user = User::create($formData);
        auth()->login($user);
        return redirect('/')->with('success', 'Welcome To, ' . $user->name);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function store_login()
    {
        $formData = request()->validate([
            'email' => ['required', 'email', Rule::exists('users', 'email')],
            'password' => ['required', 'min:8', 'max:255'],
        ]);

        if (auth()->attempt($formData)) {
            return redirect('/')->with('success', 'Welcome back');
        } else {
            return redirect()
                ->back()
                ->withErrors([
                    'email' => 'User Cretiral Wrong',
                ]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'good bye');
    }
}
