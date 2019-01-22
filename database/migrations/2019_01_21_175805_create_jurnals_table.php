<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJurnalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tahun');
            $table->integer('id_mahasiswa');
            $table->string('nama_jurnal');
            $table->text('jurnal');
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
        Schema::dropIfExists('jurnals');
    }
}
