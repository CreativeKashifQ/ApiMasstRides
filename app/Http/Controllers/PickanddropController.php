<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Vehicle;
use App\Customer;
use App\Franchise;
use App\Packagerate;
use App\Reservation;
use Illuminate\Http\Request;
use PDF;

class PickanddropController extends Controller
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
         try {
            $reservations = Reservation::where([['status','saved'],['reservation_for','pickanddrop']])->paginate(25);
            $customers = Customer::all();
            $drivers = Driver::all();
            $vehicles = Vehicle::where('availability','pickdrop')->get();
            $package_rates = Packagerate::where('package_for','pickanddrop')->get();
            $franchises = Franchise::all();
             return view('admin.pickanddrop.index',compact('reservations','customers','drivers','vehicles','package_rates','franchises'));
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
        $customers = Customer::all();
        $drivers = Driver::all();
        $package_rates = Packagerate::where('package_for','pickanddrop')->get();
        $vehicles = Vehicle::where('availability','pickdrop')->get();
        $franchises = Franchise::all();
        return view('admin.pickanddrop.create',compact('customers','drivers','package_rates','vehicles','franchises'));
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
            'reservation_type' => 'required',
            'reservation_for' => 'required',
            'branch' => 'required',
            'customer_id' => 'required',
            'driver_id' => 'required',
            'package_rate_id' => 'required',
            'vehicle_id' => 'required',
        ]);

        try {
            $reservation = new Reservation();
            $reservation->reservation_type =$request->reservation_type;
            $reservation->reservation_for =$request->reservation_for;
            $reservation->branch =$request->branch;
            $reservation->customer_id =$request->customer_id;
            $reservation->driver_id =$request->driver_id;
            $reservation->package_rate_id =$request->package_rate_id;
            $reservation->vehicle_id =$request->vehicle_id;
            $reservation->total_taxes_amount =$request->total_taxes_amount;
            $reservation->taxes_notes =$request->taxes_notes;
            $reservation->total_miscellaneous_charges =$request->total_miscellaneous_charges;
            $reservation->miscellaneous_charges_notes =$request->miscellaneous_charges_notes;
            $reservation->total_rate_amount = $request->total_rate_amount;
            $reservation->additional_charges =$request->additional_charges;
            $reservation->fuel_charges =$request->fuel_charges;
            $reservation->payment_method =$request->payment_method;
            $reservation->total_amount =$request->total_amount;
            if ($reservation->save()) {
                $reservatoin_preview_detail = Reservation::where('id',$reservation->id)->first();
                $customers = Customer::all();
                $drivers = Driver::all();
                $package_rates = Packagerate::where('package_for','pickanddrop')->get();
                $vehicles = Vehicle::all();
                $franchises = Franchise::all();
                return view('admin.pickanddrop.preview',compact('reservatoin_preview_detail','customers','drivers','package_rates','vehicles','franchises'));
            }else{
                return redirect()->back()->with('error','Occuring Error');
            }

        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }

    //Save Reservation
    public function save($id)
    {
        $reservaiton_save = Reservation::where('id',$id)->first();
        $reservaiton_save->status = 'saved';
        $reservaiton_save->save();
        return redirect()->route('pickanddrop.index')->with('success','Pick & Drop Reservation Saved Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Goodstransport  $goodstransport
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        try {
            $editreservation = Reservation::where('id',$id)->first();
            $customers = Customer::all();
            $drivers = Driver::all();
            $package_rates = Packagerate::where('package_for','pickanddrop')->get();
            $vehicles = Vehicle::where('availability','pickdrop')->get();
            $franchises = Franchise::all();
            return view('admin.pickanddrop.edit',compact('editreservation','customers','drivers','package_rates','vehicles','franchises'));
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Goodstransport  $goodstransport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'reservation_type' => 'required',
            'reservation_for' => 'required',
            'branch' => 'required',
            'customer_id' => 'required',
            'driver_id' => 'required',
            'package_rate_id' => 'required',
            'vehicle_id' => 'required',
        ]);

        try {
            $reservation =  Reservation::where('id',$id)->first();
            $reservation->reservation_type =$request->reservation_type;
            $reservation->reservation_for =$request->reservation_for;
            $reservation->branch =$request->branch;
            $reservation->customer_id =$request->customer_id;
            $reservation->driver_id =$request->driver_id;
            $reservation->package_rate_id =$request->package_rate_id;
            $reservation->vehicle_id =$request->vehicle_id;
            $reservation->total_taxes_amount =$request->total_taxes_amount;
            $reservation->taxes_notes =$request->taxes_notes;
            $reservation->total_miscellaneous_charges =$request->total_miscellaneous_charges;
            $reservation->miscellaneous_charges_notes =$request->miscellaneous_charges_notes;
            $reservation->total_rate_amount = $request->total_rate_amount;
            $reservation->additional_charges =$request->additional_charges;
            $reservation->fuel_charges =$request->fuel_charges;
            $reservation->payment_method =$request->payment_method;
            $reservation->total_amount =$request->total_amount;
            if ($reservation->save()) {
                $reservatoin_preview_detail = Reservation::where('id',$reservation->id)->first();
                $customers = Customer::all();
                $drivers = Driver::all();
                $package_rates = Packagerate::where('package_for','pickanddrop')->get();
                $vehicles = Vehicle::all();
                $franchises = Franchise::all();
                return view('admin.pickanddrop.preview',compact('reservatoin_preview_detail','customers','drivers','package_rates','vehicles','franchises'));
            }else{
                return redirect()->back()->with('error','Occuring Error');
            }

        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Goodstransport  $goodstransport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
           $reservation = Reservation::findOrFail($id);
            if ($reservation->delete()) {
                return redirect()->back()->with('success','pick & Drop Reservation Deleted Successfully');
            }
       } catch (\Exception $e) {
           return $e->getmessage();
       }
    }

       /**
     * make the invoice of specified resource from storage.
     *
     * @param  \App\Goodstransport  $goodstransport
     * @return \Illuminate\Http\Response
     */
    public function invoice($id)
    {
        try {
            $reservation = Reservation::where('id',$id)->first();
            $vehicles = Vehicle::where('availability','pickdrop')->get();
            $customers = Customer::all();
            $drivers = Driver::all();
            $package_rates = Packagerate::where('package_for','pickanddrop')->get();
            $franchises = Franchise::all();
            $pdf = PDF::loadView('admin.pickanddrop.invoice',compact('reservation','vehicles','customers','drivers','package_rates','franchises'));
            return $pdf->download('pick&dropinvoice.pdf');
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }
}
