<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class index extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = count(DB::select('select * from users'));
        $tbtransaksi = count(DB::select('select * from tbtransaksi'));

        return view('index', [
            'user' => $user,
            'transaksi' => $tbtransaksi
        ]);
    }
}
