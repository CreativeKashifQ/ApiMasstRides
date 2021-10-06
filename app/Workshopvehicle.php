<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Booking;

class Workshopvehicle extends Model
{
    //
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
