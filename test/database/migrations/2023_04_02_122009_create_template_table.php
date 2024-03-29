<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template', function (Blueprint $table) {
            $table->string('id', 18)->primary();
            $table->string('id_kategori', 5);
            $table->foreign('id_kategori')->references('id')->on('kategori');
            $table->string('id_user', 50);
            $table->foreign('id_user')->references('id')->on('users')->nullable();
            $table->string('nama_template');
            $table->string('versi');
            $table->string('link_template');
            $table->string('default_dir');
            $table->string('default_shell');
            $table->string('port');
            $table->json('env_template')->nullable();
            $table->tinyInteger('bolehkan')->default(0)->comment('0: Tidak Menyala, 1: Menyala');
            $table->tinyInteger('status_job')->default(0)->comment('0: Masuk Antrian, 1: Dalam Proses, 2: Selesai, 3: Failed');
            $table->dateTime('tgl_dibuat');
            $table->dateTime('tgl_selesai')->nullable();
            
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('template');
    }
}