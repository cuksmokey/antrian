<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            // $table->string('peserta');
            $table->date('tgl_periksa');
            $table->string('nomer_antrian');
            $table->string('nama');
            $table->string('alamat');
            $table->date('tgl_lahir');
            $table->string('no_telp');
            $table->foreignId('poli_id');
            $table->foreignId('dokter_id');
            $table->foreignId('jadwal_id');
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
        Schema::dropIfExists('pendaftarans');
    }
}
