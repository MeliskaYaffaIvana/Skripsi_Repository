<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContainerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('container', function (Blueprint $table) {
            $table->string('id', 18)->primary();
            $table->string('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('id_template')->nullable();
            $table->foreign('id_template')->references('id')->on('template')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama_kontainer');
            $table->tinyInteger('bolehkan')->default(0)->comment('0: Tidak Menyala, 1: Menyala');
            $table->tinyInteger('status_job')->default(0)->comment('0: Masuk Antrian, 1: Dalam Proses, 2: Selesai, 3: Failed');
            $table->dateTime('tgl_dibuat');
            $table->dateTime('tgl_selesai')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('container');
    }
}