<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TransaksiController extends Controller
{
    public function index()
    {
        $tbtransaksi = DB::table('tbtransaksi')->get();

        return view('/kelolatransaksi', ['tbtransaksi' => $tbtransaksi]);
    }
}
