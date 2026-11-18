<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin(Request $request)
    {
        $rememberedEmail = $request->cookie('sikap_last_email', '');
        return view('auth.login', compact('rememberedEmail'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            if ($remember) {
                Cookie::queue('sikap_last_email', $request->email, 10080);
                Cookie::queue('sikap_user_role', Auth::user()->role, 10080);
            } else {
                Cookie::queue(Cookie::forget('sikap_last_email'));
                Cookie::queue(Cookie::forget('sikap_user_role'));
            }

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau kata sandi yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'blok_kerja' => ['required', 'string', 'max:100'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'blok_kerja' => $request->blok_kerja,
            'password' => Hash::make($request->password),
            'role' => 'pekerja',
        ]);

        Auth::login($user, true);
        $request->session()->regenerate();

        Cookie::queue('sikap_last_email', $user->email, 10080);
        Cookie::queue('sikap_user_role', $user->role, 10080);

        return redirect('/dashboard')->with('success', 'Pendaftaran berhasil! Akun Anda tersimpan dengan Cookie.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Cookie::queue(Cookie::forget('sikap_user_role'));

        return redirect()->route('login');
    }
}