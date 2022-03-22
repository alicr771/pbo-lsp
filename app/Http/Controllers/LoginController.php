<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class loginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index()
    {
        return view('login');
    }

    // Disini adalah method untuk melakukan login 
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // disini saya mengambil username dan password yang di inputkan
        $credentials = $request->only('username', 'password');
        // Lalu melakukan pengecekan 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::attempt($credentials)) {
                return redirect('/index/');
            }
        }
        if (!auth()->attempt($request->only('username', 'password'))) {
            return back()->with('status', 'Username atau password yang anda masukan salah');
        };
    }
}
