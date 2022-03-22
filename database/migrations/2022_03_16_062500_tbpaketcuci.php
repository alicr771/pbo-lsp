<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tbpaketcuci extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbpaketcuci', function (Blueprint $table) {
            $table->Increments('idpaket');
            $table->string('namapaket');
            $table->string('deskripsi');
            $table->Integer('harga');

    });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbpaketcuci');
    }
}
