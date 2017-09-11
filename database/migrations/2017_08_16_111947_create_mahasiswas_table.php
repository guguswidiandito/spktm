<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->integer('user_id')->unsigned();
            $table->integer('nim');
            $table->string('asal_sekolah');
            $table->string('jenis_kelamin');
            $table->float('ipk_smt_1');
            $table->float('ipk_smt_2');
            $table->float('ipk_smt_3')->nullable();
            $table->float('ipk_smt_4')->nullable();
            $table->float('ipk_smt_5')->nullable();
            $table->float('ipk_smt_6')->nullable();
            $table->integer('angkatan');
            $table->date('tgl_kelulusan')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
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
