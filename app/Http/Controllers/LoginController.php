<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // mengalihkan user ke halaman depan
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login failed!');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }

    public function register()
    {
        return view('register', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function storeRegister(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'username' => 'required|unique:users',
            // 'jabatan' => 'required'
        ]);

        $validatedData['jabatan'] = 'Staff';
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
        return redirect('/')->with('success', 'Registration successfull! Please login');
    }
}
