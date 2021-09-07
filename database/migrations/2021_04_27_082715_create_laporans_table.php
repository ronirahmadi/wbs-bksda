<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('namapelapor');
            $table->string('kodeunik');
            $table->string('status')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('jenispelanggaran');
            $table->string('namaterlapor');
            $table->string('lokasi');
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kota');
            $table->string('provinsi');
            $table->date('tanggal');
            $table->string('waktu');
            $table->longText('uraian');
            $table->string('name');
            $table->string('path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporans');
    }
}
