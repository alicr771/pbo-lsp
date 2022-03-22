<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class kelolaUser extends Controller{

    public function index(){
    // mengambil data dari table
    $user = DB::select('select * from tbuser');
    // mengirim data ke view kelolauser
    return view('kelolauser',['user'=>$user]);
    }

    // function tambah
    public function tambah(){
        return view('tambahuser');
    }

    // function store
    public function store(Request $request)
    {
    // insert data ke table 
    DB::table('user')->insert([
        'username' => $request->username,
        'pass' => $request->pass,
    ]);
    // alihkan halaman ke halaman user
    return back();

    }

        public function edit($iduser)
    {
        // mengambil data user berdasarkan id yang dipilih
        $user = DB::where('iduser',$iduser)->get()->first();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('edituser',['user'=>$user]);
    
    }

    // method untuk hapus data pegawai
    public function hapus($iduser)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('tbuser')->where('iduser',$iduser)->delete();
            
        // alihkan halaman ke halaman pegawai
        return redirect('/kelolauser');
    }
        }
