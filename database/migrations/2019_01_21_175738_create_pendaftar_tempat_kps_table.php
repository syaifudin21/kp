<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendaftarTempatKpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftar_tempat_kps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tahun');
            $table->integer('id_dosen')->nullable();
            $table->integer('id_tempat_kp');
            $table->string('id_mahasiswa');
            $table->enum('status',['Open','Close']);
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
        Schema::dropIfExists('pendaftar_tempat_kps');
    }
}
