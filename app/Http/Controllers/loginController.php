<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class loginController extends Controller
{
    public function index(){
        return view('login', [
            
        ]);
    }

    // Disini adalah method untuk melakukan login 
    public function store(Request $request){
        $request->validate([
            'username' => 'required',
            'pass' => 'required',
        ]);
   
        // disini saya mengambil username dan password yang di inputkan
        $credentials = $request->only('username', 'pass');
        // Lalu melakukan pengecekan 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::attempt($credentials)) {
                return redirect()->intended('index')
                            ->withSuccess('Signed in');
            }
      
            return redirect("login")->withSuccess('Login details are not valid');
        }

    }    
}
