<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusContainerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('container', function (Blueprint $table) {
        $table->boolean('status')->default(true);
        $table->integer('port')->default(16000);
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('container', function (Blueprint $table) {
        $table->dropColumn('status');
        $table->dropColumn('port');
    });
}
}