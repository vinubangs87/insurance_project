<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicledetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicledetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('insuranceCompany_id')->length(20)->unsigned()->nullable();
            $table->bigInteger('producttype_id')->length(20)->unsigned()->nullable();
            $table->bigInteger('procuctname_id')->length(20)->unsigned()->nullable();
            $table->bigInteger('enginetype_id')->length(20)->unsigned()->nullable();
            $table->bigInteger('permittype_id')->length(20)->unsigned()->nullable();
            $table->bigInteger('financecompany_id')->length(20)->unsigned()->nullable();
            $table->char('customer_name','100')->nullable();
            $table->char('customer_mobile','12')->nullable();
            $table->char('customer_email','50')->nullable();
            $table->text('customer_address')->nullable();
            $table->char('vehicle_number','100')->nullable();
            $table->char('registration_number','100')->nullable();
            $table->date('registration_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->date('insurance_expiry_date')->nullable();
            $table->date('fitness_expiry_date')->nullable();
            $table->date('mv_tax_expiry_date')->nullable();
            $table->date('pucc_expiry_date')->nullable();
            $table->boolean('finance_type')->nullable();
            $table->char('permit_number','100')->nullable();
            $table->date('permit_valid_upto_date')->nullable();
            $table->char('policy_number','100')->nullable();
            $table->char('renewal_premium','10')->nullable();
            $table->char('engine_number','100')->nullable();
            $table->char('chasis_number','100')->nullable();
            $table->timestamps();
            $table->foreign('insuranceCompany_id')->references('id')->on('insurance_companies')->onDelete('cascade');
            $table->foreign('producttype_id')->references('id')->on('producttypes')->onDelete('cascade');
            $table->foreign('procuctname_id')->references('id')->on('procuctnames')->onDelete('cascade');
            $table->foreign('enginetype_id')->references('id')->on('enginetypes')->onDelete('cascade');
            $table->foreign('permittype_id')->references('id')->on('permittypes')->onDelete('cascade');
            $table->foreign('financecompany_id')->references('id')->on('financecompanies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicledetails');
    }
}
