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
            $table->id('id_template');
            $table->unsignedBigInteger('id_kat');
            $table->foreign('id_kat')->references('id_kat')->on('kategori')->onDelete('cascade')->onUpdate('cascade');
            $table->String('tipe_template');
            $table->String('versi');
            $table->String('status_template');
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
