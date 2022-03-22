<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // mengambil data dari table
        $user = DB::select('select * from users');
        // mengirim data ke view kelolauser
        return view('kelolauser', ['user' => $user]);
    }

    // function tambah
    public function create()
    {
        return view('tambahuser');
    }

    // function store
    public function store(Request $request)
    {
        $password = bcrypt($request->pass);
        // insert data ke table 
        DB::table('users')->insert([
            'username' => $request->username,
            'password' => $password,
        ]);
        // alihkan halaman ke halaman user
        return back();
    }

    public function edit($iduser)
    {
        // mengambil data user berdasarkan id yang dipilih
        $user = DB::table('users')->where('id', $iduser)->get()->first();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view(
            'edituser',
            ['user' => $user]
        );
    }

    public function update($iduser, Request $request)
    {
        DB::table('users')
            ->where('id',  $iduser)
            ->update(['username' => $request->username]);

        return back();
    }

    // method untuk hapus data pegawai
    public function hapus($iduser)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('users')->where('id', $iduser)->delete();

        // alihkan halaman ke halaman pegawai
        return redirect('/kelolauser');
    }
}
