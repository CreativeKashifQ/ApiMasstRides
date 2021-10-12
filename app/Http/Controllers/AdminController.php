<?php

namespace App\Http\Controllers;

use App\User;
use App\Driver;
use App\Vehicle;
use App\Customer;
use App\Franchise;
use App\VehicleRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    public function dashboard()
    {

        $admin = auth()->user()->isAdmin();
        $franchisee = auth()->user()->isFranchisee();
        if($admin){
            $franchises = Franchise::count();
            $customers = Customer::count();
            $drivers = Driver::count();
            $v_requests = VehicleRequest::count();
            $vehicles = Vehicle::count();
            return view('admin.dashboards.a-dashboard',compact('franchises','customers','drivers','v_requests','vehicles'));
        }elseif($franchisee){
            $franchise = auth()->user()->franchise;
            // $vehicles = Vehicle::where('city',$franchise->city)->get();
            return view('admin.dashboards.f-dashboard');
        }

    }
}
