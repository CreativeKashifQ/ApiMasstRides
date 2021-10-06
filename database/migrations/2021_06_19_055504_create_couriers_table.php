<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('couriers', function (Blueprint $table) {
            $table->id();
            $table->string('recipient_name')->nullable();
            $table->string('recipient_phone')->nullable();
            $table->string('recipient_address')->nullable();
            $table->string('recipient_email')->nullable();
            $table->string('tracking_no')->nullable();
            $table->string('couriertypeId')->nullable();
            $table->string('couriercontentId')->nullable();
            $table->string('Courierweight')->nullable();
            $table->string('Courierpieces')->nullable();
            $table->string('OfranchiseId')->nullable();
            $table->string('ofranchise_saved')->default('no');
            $table->string('DfranchiseId')->nullable();
            $table->string('dfranchise_saved')->default('no');
            $table->string('sender_name')->nullable();
            $table->string('sender_phone')->nullable();
            $table->string('sender_address')->nullable();
            $table->string('sender_email')->nullable();
            $table->string('couriercontentPrice')->nullable();
            $table->string('couriertypePrice')->nullable();
            $table->string('DfranchiseLocationCourierKgPrice')->nullable();
            $table->string('discount')->nullable();
            $table->string('TotalAmount')->nullable();
            $table->string('preview')->default('0');
            $table->string('status')->default(0);
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
        Schema::dropIfExists('couriers');
    }
}
