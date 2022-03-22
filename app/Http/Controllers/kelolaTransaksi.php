<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class kelolaTransaksi extends Controller{
public function index(){
    $transaksi = DB::select('select * from tbtransaksi');
    return view('kelolatransaksi',['transaksi'=>$transaksi]);
    }
    }
