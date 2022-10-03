<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDefaultvalueOfFieldsInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paymentsettlements', function (Blueprint $table) {
            $table->bigInteger('vehicledetail_id')->nullable()->change();
            $table->bigInteger('insuranceAmountHisstory_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paymentsettlements', function (Blueprint $table) {
            //
        });
    }
}
