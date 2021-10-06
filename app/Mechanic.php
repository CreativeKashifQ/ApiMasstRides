<?php

namespace App;
use App\Booking;

use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
    //many Mechanics belongs To One booking
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
