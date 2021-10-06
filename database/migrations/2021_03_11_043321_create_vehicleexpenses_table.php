<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleexpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicleexpenses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vehicle_id'); 
            $table->string('expense_id');
            $table->string('date');
            $table->string('amount');
            $table->string('details');
            $table->string('notes');
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
        Schema::dropIfExists('vehicleexpenses');
    }
}
