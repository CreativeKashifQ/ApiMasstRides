<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Customer;
use App\Driver;
use App\Franchise;
use App\Packagerate;
use App\Vehicle;
use Illuminate\Http\Request;
use PDF;

class ReservationController extends Controller
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
            $reservations = Reservation::where([['status','saved'],['reservation_for','rentacar']])->paginate(25);
            $customers = Customer::all();
            $drivers = Driver::all();
            $vehicles = Vehicle::all();
            $package_rates = Packagerate::all();
            $franchises = Franchise::all();
             return view('admin.reservation.index',compact('reservations','customers','drivers','vehicles','package_rates','franchises'));
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
        $package_rates = Packagerate::where('package_for','rentacar')->get();
        $vehicles = Vehicle::where('availability','onrent')->get();
        $franchises = Franchise::all();
        return view('admin.reservation.create',compact('customers','drivers','package_rates','vehicles','franchises'));
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
            $reservation->self = $request->self ? $request->self : 'no';
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
                $package_rates = Packagerate::all();
                $vehicles = Vehicle::all();
                $franchises = Franchise::all();
                return view('admin.reservation.preview',compact('reservatoin_preview_detail','customers','drivers','package_rates','vehicles','franchises'));
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
        $customer = Customer::where('id',$reservaiton_save->customer_id)->first();
        $driver = Driver::where('id',$reservaiton_save->driver_id)->first();
        $phones = [$customer->phone,$driver->phone];
        foreach($phones as $phone){
            $input_xml = '<SMSRequest>
            <Username>03028510615</Username>
            <Password>Jazz@123</Password>
            <From>MASST RIDES</From>
            <To>'.$phone.'</To>
            <Message>Welcome To Masst Rides ! You are now our company participent, Thank you choosing us..</Message>
            <urdu>0</urdu>
            <statuscode>0</statuscode>
            </SMSRequest>';

            $url = "https://connect.jazzcmt.com/sendsms_xml.html";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POSTFIELDS,"xmldoc=" . $input_xml);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
            // curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 1 );
            curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt( $ch, CURLOPT_AUTOREFERER, true );
             $data = curl_exec($ch);
            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            //convert the XML result into array
            $array_data = json_decode(json_encode(simplexml_load_string($data)), true);
            }
        return redirect()->route('reservation.index')->with('success','Reservation Saved Successfully'.' '.$array_data['statusmessage'] . ' '. 'To Customer & Driver Mobiles Number !');
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
            $package_rates = Packagerate::all();
            $vehicles = Vehicle::where('availability','onrent')->get();
            $franchises = Franchise::all();
            return view('admin.reservation.edit',compact('editreservation','customers','drivers','package_rates','vehicles','franchises'));
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
            $reservation->self = $request->self ? $request->self : 'no';
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
                $package_rates = Packagerate::all();
                $franchises = Franchise::all();
                $vehicles = Vehicle::all();
                return view('admin.reservation.preview',compact('reservatoin_preview_detail','customers','drivers','package_rates','franchises','vehicles'));
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
                return redirect()->back()->with('success','Reservation Deleted Successfully');
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
            $vehicles = Vehicle::all();
            $customers = Customer::all();
            $drivers = Driver::all();
            $package_rates = Packagerate::all();
            $franchises = Franchise::all();
            $pdf = PDF::loadView('admin.reservation.invoice',compact('reservation','vehicles','customers','drivers','package_rates','franchises'));
            return $pdf->download('reservationinvoice.pdf');
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }
}
