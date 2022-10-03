<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDatatypesOfFieldsInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('insurance_amount_histories', function (Blueprint $table) {
            $table->string('insurance_amount')->nullable()->change();
            $table->string('advance_amount')->nullable()->change();
            $table->string('intrest_rate')->nullable()->change();
            $table->string('remaining_amount_without_intrest')->nullable()->change();
            $table->string('remaining_amount_with_intrest')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('insurance_amount_histories', function (Blueprint $table) {
            //
        });
    }
}
