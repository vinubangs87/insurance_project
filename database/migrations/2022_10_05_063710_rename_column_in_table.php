<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnInTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('insurance_amount_histories', function (Blueprint $table) {
            $table->renameColumn('insurance_amount', 'intrest_amount');
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
            $table->renameColumn('intrest_amount', 'insurance_amount');
        });
    }
}
