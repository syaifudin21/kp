<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempatKpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempat_kps', function (Blueprint $table) {
            $table->increments('id');
            $table->text('nama');
            $table->text('alamat');
            $table->string('bidang');
            $table->integer('kapasitas');
            $table->enum('auth',['Admin', 'Koordinator', 'Mahasiswa', 'Dosen']);
            $table->integer('id_user');
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
        Schema::dropIfExists('tempat_kps');
    }
}
