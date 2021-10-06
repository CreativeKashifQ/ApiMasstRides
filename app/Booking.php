<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Workshopvehicle;
use App\Service;
use App\Mechanic;

class Booking extends Model
{
    protected $guarded = [];

    public function workshopvehicle()
    {
        return $this->hasOne(Workshopvehicle::class);
    }

    //Customer has Booking
    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    //Booking has many services
    public function services()
    {
        return $this->hasMany(Service::class);
    }

    //Booking Can have many Mechanics
    public function mechanics()
    {
        return $this->hasMany(Mechanic::class);
    }
}
