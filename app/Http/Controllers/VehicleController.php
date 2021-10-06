<?php

namespace App\Http\Controllers;

use App\Engine;
use App\Franchise;
use App\Make;
use App\Vehicle;
use App\Vcategory;
use Illuminate\Http\Request;
use Image;

class VehicleController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $vehicles = Vehicle::all();
        $makes = Make::all();
        $engines = Engine::all();
        $franchises = Franchise::all();
        return view('admin.vehicle.index',compact('vehicles','makes','engines','franchises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $vcategories = Vcategory::all();
            $franchises = Franchise::all();
            $companies = Make::all();
            $engines = Engine::all();
            return view('admin.vehicle.create',compact('vcategories','franchises','companies','engines'));
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

           $request->validate([
            'stocknumber' => 'required',
            'regno' => 'required',
            'make'=> 'required',
            'type' => 'required',
            'color' => 'required',
            'transmission'=> 'required',
            'engine' => 'required',
            'fuel_charg' => 'required',
            'first_date' => 'required',
            'tracker'=> 'required',
            'purchase_price' => 'required',
            'availability' => 'required',
            'branch'=> 'required',
            'name' => 'required',
            'model' => 'required',
            'location' => 'required',
            'vcategory' => 'required',
            'year' => 'required',
            'vcategory' => 'required',
            'country' => 'required',
            'image' => 'required',
        ]);

        try {
            $image = $request->file('image');
                $random = rand(111111111,999999999);
                $filename = $random . '.' . $image->getClientOriginalExtension();
                Image::make( $image )->resize( 200, 200 )->save(public_path('images/uploads/cars'. $filename ));

            $vehicle = new Vehicle;
            $vehicle->stocknumber =$request->stocknumber;
            $vehicle->regno =$request->regno;
            $vehicle->make =$request->make;
            $vehicle->type =$request->type;
            $vehicle->color =$request->color;
            $vehicle->transmission =$request->transmission;
            $vehicle->engine =$request->engine;
            $vehicle->fuel_charg =$request->fuel_charg;
            $vehicle->first_date =$request->first_date;
            $vehicle->tracker =$request->tracker;
            $vehicle->purchase_price =$request->purchase_price;
            $vehicle->availability =$request->availability;
            $vehicle->branch =$request->branch;
            $vehicle->name =$request->name;
            $vehicle->model =$request->model;
            $vehicle->year =$request->year;
            $vehicle->location =$request->location;
            $vehicle->vcategory =$request->vcategory;
            $vehicle->country =$request->country;
            $vehicle->image =$filename;
            $vehicle->message =$request->information;

            if ($vehicle->save()) {
                return redirect()->back()->with('success','Vehicle Added Successfully');
            }else{
                return redirect()->back()->with('error','Occuring Error');
            }
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $editvehicle = Vehicle::where('id',$id)->first();
            $franchises = Franchise::all();
            $companies = Make::all();
            $engines = Engine::all();
            return view('admin.vehicle.edit',compact('editvehicle','franchises','companies','engines'));
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

         $request->validate([
            'stocknumber' => 'required',
            'regno' => 'required',
            'make'=> 'required',
            'type' => 'required',
            'color' => 'required',
            'transmission'=> 'required',
            'engine' => 'required',
            'fuel_charg' => 'required',
            'first_date' => 'required',
            'tracker'=> 'required',
            'purchase_price' => 'required',
            'availability' => 'required',
            'branch'=> 'required',
            'name' => 'required',
            'model' => 'required',
            'location' => 'required',
            'vcategory' => 'required',
            'year' => 'required',
            'vcategory' => 'required',
            'country' => 'required',
        ]);

        try {
            if($request->has('image')){
            $image = $request->file('image');
                $random = rand(111111111,999999999);
                $filename = $random . '.' . $image->getClientOriginalExtension();
                Image::make( $image )->resize( 200, 200 )->save(public_path('images/uploads/cars'. $filename ));
            $vehicle = Vehicle::where('id',$id)->first();
            $vehicle->stocknumber =$request->stocknumber;
            $vehicle->regno =$request->regno;
            $vehicle->make =$request->make;
            $vehicle->type =$request->type;
            $vehicle->color =$request->color;
            $vehicle->transmission =$request->transmission;
            $vehicle->engine =$request->engine;
            $vehicle->fuel_charg =$request->fuel_charg;
            $vehicle->first_date =$request->first_date;
            $vehicle->tracker =$request->tracker;
            $vehicle->purchase_price =$request->purchase_price;
            $vehicle->availability =$request->availability;
            $vehicle->branch =$request->branch;
            $vehicle->name =$request->name;
            $vehicle->model =$request->model;
            $vehicle->year =$request->year;
            $vehicle->location =$request->location;
            $vehicle->vcategory =$request->vcategory;
            $vehicle->country =$request->country;
            $vehicle->image =$filename;
            $vehicle->message =$request->information;

            if ($vehicle->save()) {
                return redirect()->back()->with('success','Vehicle Updated Successfully');
            }else{
                return redirect()->back()->with('error','Occuring Error');
            }
        }
        else{

            $vehicle = Vehicle::where('id',$id)->first();
            $vehicle->stocknumber =$request->stocknumber;
            $vehicle->regno =$request->regno;
            $vehicle->make =$request->make;
            $vehicle->type =$request->type;
            $vehicle->color =$request->color;
            $vehicle->transmission =$request->transmission;
            $vehicle->engine =$request->engine;
            $vehicle->fuel_charg =$request->fuel_charg;
            $vehicle->first_date =$request->first_date;
            $vehicle->tracker =$request->tracker;
            $vehicle->purchase_price =$request->purchase_price;
            $vehicle->availability =$request->availability;
            $vehicle->branch =$request->branch;
            $vehicle->name =$request->name;
            $vehicle->model =$request->model;
            $vehicle->year =$request->year;
            $vehicle->location =$request->location;
            $vehicle->vcategory =$request->vcategory;
            $vehicle->country =$request->country;
            $vehicle->image =$vehicle->image;
            $vehicle->message =$request->information;

            if ($vehicle->save()) {
                return redirect()->back()->with('success','Vehicle Updated Successfully With Previous Image');
            }else{
                return redirect()->back()->with('error','Occuring Error');
            }


        }



        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }

    /**
     * Trahsed the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destory($id)
    {

       try {
           $vehicle = Vehicle::findOrFail($id);
            if ($vehicle->forcedelete()) {
                return redirect()->back()->with('success','Vehicle Deleted Successfully');
            }
       } catch (\Exception $e) {
           return $e->getmessage();
       }
    }

    //Fleets Vehicle Management

    public function available()
    {
        try {
            $vehicles = Vehicle::where('availability','available')->get();
             return view('admin.vehicle.available',compact('vehicles'));
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }

    //Goods And transport
    public function goodstransport()
    {
        try {
            $vehicles = Vehicle::where('availability','goodstransport')->get();
             return view('admin.vehicle.goodstransport',compact('vehicles'));
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }
    //For Functions Rides Listing
    public function functions()
    {
        try {
            $vehicles = Vehicle::where('availability','function')->get();
             return view('admin.vehicle.function',compact('vehicles'));
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }
    //Tour Travel Listing
    public function tourtravel()
    {
        try {
            $vehicles = Vehicle::where('availability','tourtravel')->get();
             return view('admin.vehicle.tourtravel',compact('vehicles'));
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }

    //Out Of City Vehicles
    public function outofcity()
    {
        try {
            $vehicles = Vehicle::where('availability','outofcity')->get();
             return view('admin.vehicle.outofcity',compact('vehicles'));
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }
    //Hourly Rides Vehicles
    public function hourlyrides()
    {
        try {
            $vehicles = Vehicle::where('availability','hourlyrides')->get();
             return view('admin.vehicle.hourlyrides',compact('vehicles'));
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }
    //OnRent Listing
    public function onrent()
    {
        try {
            $vehicles = Vehicle::where('availability','onrent')->get();
             return view('admin.vehicle.onrent',compact('vehicles'));
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }

     //PickDrop Listing
    public function pickdrop()
    {
        try {
            $vehicles = Vehicle::where('availability','pickdrop')->get();
             return view('admin.vehicle.pickdrop',compact('vehicles'));
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }
}
