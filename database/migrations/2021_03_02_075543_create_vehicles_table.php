<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('reg_no')->nullable();
            $table->string('makeid')->nullable();
            $table->string('nameid')->nullable();
            $table->string('modelid')->nullable();
            $table->string('engineid')->nullable();
            $table->string('typeid')->nullable();
            $table->string('colorid')->nullable();
            $table->string('transmissionid')->nullable();
            $table->string('fuletypeid')->nullable();
            $table->string('registrationdate')->nullable();
            $table->string('tracker')->nullable();
            $table->string('registerforid')->nullable();
            $table->string('franchiseid')->nullable();
            $table->string('class')->nullable();
            $table->string('year')->nullable();
            $table->string('country')->nullable();
            $table->string('image')->nullable();
            //owner information is in vowners table
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
        Schema::dropIfExists('vehicles');
    }
}
