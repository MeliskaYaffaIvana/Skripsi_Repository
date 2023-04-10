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
            $table->id('id_container');
            $table->String('judul');
            $table->String('deskripsi');
            $table->unsignedBigInteger('frontend')->nullable();
            $table->foreign('frontend')->references('id_template')->on('template')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('backend')->nullable();
            $table->foreign('backend')->references('id_template')->on('template')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('database')->nullable();
            $table->foreign('database')->references('id_template')->on('template')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('container');
    }
}

