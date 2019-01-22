<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKegiatanKpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan_kps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pendaftar'); //id_kelompok
            $table->text('kegiatan');
            $table->enum('status',['Belum Diverifikasi', 'Verifikasi'])->default('Belum Diverifikasi');
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
        Schema::dropIfExists('kegiatan_kps');
    }
}
