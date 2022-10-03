<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsuranceAmountHisstoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_amount_histories', function (Blueprint $table) {
            $table->bigIncrements('id')->length(233);
            $table->bigInteger('vehicledetail_id')->length(233)->unsigned();
            $table->decimal('insurance_amount', 20, 2)->nullable();    
            $table->set('payment_type', ['fullpayme'=>1, 'partial_payment'=>0])->nullable();
            $table->decimal('advance_amount', 20, 2)->nullable();    
            $table->decimal('intrest_rate', 20, 2)->nullable();    
            $table->decimal('remaining_amount_without_intrest', 20, 2)->nullable();    
            $table->decimal('remaining_amount_with_intrest', 20, 2)->nullable();    
            $table->date('advance_amount_date')->nullable();    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insurance_amount_hisstories');
    }
}
