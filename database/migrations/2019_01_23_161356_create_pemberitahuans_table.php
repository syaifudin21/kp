<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemberitahuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemberitahuans', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('auth_pengirim',['Admin', 'Koordinator', 'Mahasiswa', 'Dosen']);
            $table->integer('id_pengirim');
            $table->enum('auth_penerima',['Admin', 'Koordinator', 'Mahasiswa', 'Dosen']);
            $table->integer('id_penerima');
            $table->text('pesan');
            $table->text('link')->nullable();
            $table->enum('warna',['success', 'primary', 'danger'])->default('primary');
            $table->enum('status',['Terkirim', 'Terbaca', 'Hapus'])->default('Terkirim');
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
        Schema::dropIfExists('pemberitahuans');
    }
}
