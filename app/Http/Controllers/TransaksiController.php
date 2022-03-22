<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tbtransaksi = DB::table('tbtransaksi')->get();

        return view('/kelolatransaksi', ['transaksi' => $tbtransaksi]);
    }
}
