<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicleexpense extends Model
{
    //VehicleExpense belongsTo Vehicle

    public function vehicle()
    {
    	return $this->belongsTo(Vehicle::class);
    }
}
