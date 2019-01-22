<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('hp')->nullable();
            $table->text('alamat')->nullable();
            $table->enum('jk',['Laki-laki', 'Perempuan'])->nullable();
            $table->string('email')->unique();
            $table->integer('id_prodi')->nullable();
            $table->string('ttl')->nullable();
            $table->enum('agama',['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha'])->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('mahasiswas');
    }
}
