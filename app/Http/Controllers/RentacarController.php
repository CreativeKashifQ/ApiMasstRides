<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Vehicle;

class RentacarController extends Controller
{
    //
    public function index()
    {
      try {
            $available = Vehicle::where('availability','available')->count();
            $onrent = Vehicle::where('availability','onrent')->count();
            $goodstransport = Vehicle::where('availability','goodstransport')->count();
            $tourstravel = Vehicle::where('availability','tourstravel')->count();
            $hourlyrides = Vehicle::where('availability','hourlyrides')->count();
            $pickdrop = Vehicle::where('availability','pickdrop')->count();
            $accident = Vehicle::where('availability','accident')->count();
            $maintenance = Vehicle::where('availability','maintenance')->count();
            $sold = Vehicle::where('availability','sold')->count();
            return view('admin.rentacar.index',compact('available','onrent','goodstransport','tourstravel','hourlyrides','pickdrop','accident','maintenance','sold'));
       } catch (\Exception $e) {
           return $e->getmessage();
       }

    }
}
