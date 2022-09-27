<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsInVehicledetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vehicledetails', function (Blueprint $table) {
            $table->char('rc_image','200')->nullable()->after('expiry_date');
            $table->date('insurance_start_date')->nullable()->after('rc_image');
            $table->char('previous_insurance_file','200')->nullable()->after('insurance_expiry_date');
            $table->char('new_insurance_file','200')->nullable()->after('previous_insurance_file');
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
