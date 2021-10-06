<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodstransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goodstransports', function (Blueprint $table) {
            $table->id();
            $table->string('reservation_type');
            $table->string('reservation_for');
            $table->string('branch');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('driver_id');
            $table->string('vehicle_type');
            $table->string('goods_type');
            $table->unsignedBigInteger('vehicle_id');
            $table->string('total_taxes_amount');
            $table->text('taxes_notes');
            $table->string('pick_up_location');
            $table->string('drop_off_location');
            $table->string('weight_of_transport');
            $table->string('rate_per_hour');
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
        Schema::dropIfExists('goodstransports');
    }
}
