<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tbtransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbtransaksi', function (Blueprint $table) {
            $table->Increments('idtransaksi');
            $table->date('tgltransaksi');
            $table->string('nama');
            $table->Integer('iduser');
            $table->Integer('idpaketcuci');
            $table->string('namapakettambahan');
            $table->Integer('totalharga');
            $table->Integer('pembayaran');
            $table->Integer('kembalian');

    });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbtransaksi');
    }
}
