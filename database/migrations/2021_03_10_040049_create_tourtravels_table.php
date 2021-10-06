<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourtravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourtravels', function (Blueprint $table) {
            $table->id();
            $table->string('reservation_type');
            $table->string('reservation_for');
            $table->string('branch');
            $table->string('facility');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('package_rate_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->string('total_taxes_amount');
            $table->text('taxes_notes');
            $table->string('dep_date');
            $table->string('arrival_date');
            $table->string('passengers');
            $table->string('destination');
            $table->string('total_miscellaneous_charges');
            $table->text('miscellaneous_charges_notes');
            $table->string('total_rate_amount')->nullable();
            $table->string('additional_charges');
            $table->string('fuel_charges');
            $table->string('payment_method');
            $table->string('total_amount');
            $table->string('status')->nullable();
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
        Schema::dropIfExists('tourtravels');
    }
}
