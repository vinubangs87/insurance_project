<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDatatypeInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('insurance_amount_histories', function (Blueprint $table) {
            $table->boolean('payment_type')->nullable()->comment('fullpayme=>1, partial_payment=>0')->change();
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
