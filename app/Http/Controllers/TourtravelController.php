<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Vehicle;
use App\Customer;
use App\Franchise;
use App\Tourtravel;
use App\Packagerate;
use Illuminate\Http\Request;
use PDF;

class TourtravelController extends Controller
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
            $reservations = Tourtravel::where([['status','saved'],['reservation_for','tourtravel']])->paginate(25);
            $customers = Customer::all();
            $drivers = Driver::all();
            $vehicles = Vehicle::all();
            $package_rates = Packagerate::all();
            $franchises = Franchise::all();
             return view('admin.tourtravel.index',compact('reservations','customers','drivers','vehicles','package_rates','franchises'));
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
        $package_rates = Packagerate::where('package_for','tourtravel')->get();
        $vehicles = Vehicle::where('availability','tourstravel')->get();
        $franchises = Franchise::all();
        return view('admin.tourtravel.create',compact('customers','drivers','package_rates','vehicles','franchises'));
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
            'dep_date' => 'required',
            'arrival_date' => 'required',
            'passengers' => 'required',
            'destination' => 'required',
            'vehicle_id' => 'required',
            'total_rate_amount'=>'required',
        ]);

        try {
            $tourtravel = new Tourtravel();
            $tourtravel->reservation_type =$request->reservation_type;
            $tourtravel->reservation_for =$request->reservation_for;
            $tourtravel->branch =$request->branch;
            $tourtravel->facility = json_encode($request->facility);
            $tourtravel->customer_id =$request->customer_id;
            $tourtravel->driver_id =$request->driver_id;
            $tourtravel->package_rate_id =$request->package_rate_id;
            $tourtravel->vehicle_id =$request->vehicle_id;
            $tourtravel->total_taxes_amount =$request->total_taxes_amount;
            $tourtravel->dep_date =$request->dep_date;
            $tourtravel->arrival_date =$request->arrival_date;
            $tourtravel->passengers =$request->passengers;
            $tourtravel->destination =$request->destination;
            $tourtravel->taxes_notes =$request->taxes_notes;
            $tourtravel->total_miscellaneous_charges =$request->total_miscellaneous_charges;
            $tourtravel->miscellaneous_charges_notes =$request->miscellaneous_charges_notes;
            $tourtravel->additional_charges =$request->additional_charges;
            $tourtravel->total_rate_amount = $request->total_rate_amount;
            $tourtravel->fuel_charges =$request->fuel_charges;
            $tourtravel->payment_method =$request->payment_method;
            $tourtravel->total_amount =$request->total_amount;
            if ($tourtravel->save()) {
                $reservatoin_preview_detail = Tourtravel::where('id',$tourtravel->id)->first();
                $customers = Customer::all();
                $drivers = Driver::all();
                $package_rates = Packagerate::all();
                $vehicles = Vehicle::all();
                $franchises = Franchise::all();
                return view('admin.tourtravel.preview',compact('reservatoin_preview_detail','customers','drivers','package_rates','vehicles','franchises'));
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
        $reservaiton_save = Tourtravel::where('id',$id)->first();
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
        return redirect()->route('tourtravel.index')->with('success','Tour&Travel Reservation Saved Successfully'.' '.$array_data['statusmessage'] . ' '. 'To Customer & Driver Mobiles Number !');

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
            $editreservation = Tourtravel::where('id',$id)->first();
            $customers = Customer::all();
            $drivers = Driver::all();
            $package_rates = Packagerate::all();
            $vehicles = Vehicle::all();
            $franchises = Franchise::all();
            return view('admin.tourtravel.edit',compact('editreservation','customers','drivers','package_rates','vehicles','franchises'));
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
            'dep_date' => 'required',
            'arrival_date' => 'required',
            'passengers' => 'required',
            'destination' => 'required',
            'vehicle_id' => 'required',
            'total_rate_amount'=>'required',
        ]);

        try {
            $tourtravel = Tourtravel::where('id',$id)->first();
            $tourtravel->reservation_type =$request->reservation_type;
            $tourtravel->reservation_for =$request->reservation_for;
            $tourtravel->branch =$request->branch;
            $tourtravel->facility = json_encode($request->facility);
            $tourtravel->customer_id =$request->customer_id;
            $tourtravel->driver_id =$request->driver_id;
            $tourtravel->package_rate_id =$request->package_rate_id;
            $tourtravel->vehicle_id =$request->vehicle_id;
            $tourtravel->total_taxes_amount =$request->total_taxes_amount;
            $tourtravel->dep_date =$request->dep_date;
            $tourtravel->arrival_date =$request->arrival_date;
            $tourtravel->passengers =$request->passengers;
            $tourtravel->destination =$request->destination;
            $tourtravel->taxes_notes =$request->taxes_notes;
            $tourtravel->total_miscellaneous_charges =$request->total_miscellaneous_charges;
            $tourtravel->miscellaneous_charges_notes =$request->miscellaneous_charges_notes;
            $tourtravel->additional_charges =$request->additional_charges;
            $tourtravel->total_rate_amount = $request->total_rate_amount;
            $tourtravel->fuel_charges =$request->fuel_charges;
            $tourtravel->payment_method =$request->payment_method;
            $tourtravel->total_amount =$request->total_amount;
            if ($tourtravel->save()) {
                $reservatoin_preview_detail = Tourtravel::where('id',$tourtravel->id)->first();
                $customers = Customer::all();
                $drivers = Driver::all();
                $package_rates = Packagerate::all();
                $vehicles = Vehicle::all();
                $franchises = Franchise::all();
                return view('admin.tourtravel.preview',compact('reservatoin_preview_detail','customers','drivers','package_rates','vehicles','franchises'));
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
           $reservation = Tourtravel::findOrFail($id);
            if ($reservation->delete()) {
                return redirect()->back()->with('success','Tour & Travel Reservation Deleted Successfully');
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
            $reservation = Tourtravel::where('id',$id)->first();
            $vehicles = Vehicle::all();
            $customers = Customer::all();
            $drivers = Driver::all();
            $package_rates = Packagerate::all();
            $franchises = Franchise::all();
            $pdf = PDF::loadView('admin.tourtravel.invoice',compact('reservation','vehicles','customers','drivers','package_rates','franchises'));
            return $pdf->download('tourtravelinvoice.pdf');
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }
}
