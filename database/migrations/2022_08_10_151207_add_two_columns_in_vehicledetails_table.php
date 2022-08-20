<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTwoColumnsInVehicledetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicledetails', function (Blueprint $table) {
            $table->date('policy_start_date')->nullable()->after('policy_number');
            $table->date('policy_end_date')->nullable()->after('policy_start_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vehicledetails', function (Blueprint $table) {
            //
        });
    }
}
