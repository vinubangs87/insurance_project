<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paymentsettlements', function (Blueprint $table) {
            $table->bigIncrements('id')->length(233)->change();
            $table->bigInteger('vehicledetail_id')->length(233)->unsigned();
            $table->bigInteger('insuranceAmountHisstory_id')->length(233)->unsigned();
            $table->boolean('is_payment_settled')->nullable()->comment('yes=>1, No=>0');
            $table->date('payment_settled_date')->nullable();
            $table->bigInteger('settled_by')->length(233)->unsigned()->nullable();
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
