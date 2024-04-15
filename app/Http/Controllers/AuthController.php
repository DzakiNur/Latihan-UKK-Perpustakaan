<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function indexLogin()
    {
        return view('auth.login');
    }

    public function indexRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request-> validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'role' => 'required'
        ]);

        $data['password'] = bcrypt($data['password']);
        $data['role'] = 'user';
        User::create($data);

        return redirect('indexLogin');

        // if (Auth::attempt(!$data)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/dashboard');
        // } else {
        //     return back()->with('error', 'Username / Password yang anda masukan salah');
        // }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user() && Auth::user()->role == 'admin') {
                return redirect()->intended('admin/dashboard');
            }
            return redirect()->intended('admin/dashboard');
        } else {
            return back()->with('error', 'Username / Password yang anda masukan salah');
        }
    }

    public function logout (Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
