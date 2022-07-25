<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeForeignKeyToProducttypesIdInProcuctnamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('procuctnames', function (Blueprint $table) {
            $table->bigInteger('producttypes_id')->length(20)->unsigned()->change();
            $table->foreign('producttypes_id')->references('id')->on('producttypes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('procuctnames', function (Blueprint $table) {
            //
        });
    }
}
