<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class tambahUser extends Controller
{
            // function tambah
    public function index(){
        return view('tambahuser');
    }

    // function store
    public function store(Request $request)
    {
    // insert data ke table 
    DB::table('tbuser')->insert([
        'username' => $request->username,
        'pass' => $request->pass,
    ]);
    // alihkan halaman ke halaman user
    return back();

    }

}
