<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomentarJurnalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_jurnals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jurnal');
            $table->integer('id_member');
            $table->text('komentar');
            $table->enum('status',['Dosen', 'Mahasiswa']);
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
        Schema::dropIfExists('komentar_jurnals');
    }
}
