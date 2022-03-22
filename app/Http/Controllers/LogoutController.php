<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function store()
    {
        Session::flush();
        auth()->logout();

        return redirect('/login/');
    }
}
