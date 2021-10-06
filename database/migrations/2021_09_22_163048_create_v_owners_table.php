<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('v_owners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id');
            $table->string('o_name')->nullable();
            $table->string('o_email')->nullable();
            $table->string('o_phone')->nullable();
            $table->string('o_cnic')->nullable();
            $table->string('o_address')->nullable();
            $table->string('o_status')->nullable();
            $table->string('o_company_name')->nullable();
            $table->string('o_company_number')->nullable();
            $table->string('o_company_file')->nullable();
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
        Schema::dropIfExists('v_owners');
    }
}
