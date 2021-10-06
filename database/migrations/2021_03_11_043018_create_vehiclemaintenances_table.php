<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclemaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiclemaintenances', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vmaintenance_id');
            $table->string('mlservive');
            $table->string('imilage');
            $table->string('lservicedate');
            $table->string('nservicedate');
            $table->string('ninspectiondate');
            $table->string('icompany');
            $table->string('texpirationdate');
            $table->string('mottest');
            $table->string('iexpirationdate');
            $table->string('ipnumber');
            $table->string('apaid');
            $table->string('adue');
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
        Schema::dropIfExists('vehiclemaintenances');
    }
}
