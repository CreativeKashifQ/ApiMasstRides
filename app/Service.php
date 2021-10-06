<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Booking;

class Service extends Model
{
    //Services belongs to Booking
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
