<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id', 50)->primary();    
            $table->string('nim', 10)->unique();
            $table->string('nama', 100);
            $table->string('judul')->nullable();
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['administrator', 'mahasiswa']);
            $table->string('password');
            $table->tinyInteger('terdaftar')->default(0)->comment('0: Tidak Terdaftar, 1: Terdaftar');
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
        Schema::dropIfExists('users');
    }
}