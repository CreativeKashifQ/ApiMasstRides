<?php

namespace App\Http\Controllers;

use App\Goodstransport;
use Illuminate\Http\Request;
use App\Vehicle;
use App\Customer;
use App\Driver;
use App\Franchise;
use App\Packagerate;
use PDF;
use Image;

class GoodstransportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Goods Transport Analysis
    public function analysis()
    {
        $flatbed = Goodstransport::where('vehicle_type','flatbed')->get()->count();
        $container = Goodstransport::where('vehicle_type','container')->get()->count();
        $halfbody = Goodstransport::where('vehicle_type','halfbody')->get()->count();
        $mazda = Goodstransport::where('vehicle_type','mazda')->get()->count();
        $shehzore = Goodstransport::where('vehicle_type','shehzore')->get()->count();
        $pickup = Goodstransport::where('vehicle_type','pickup')->get()->count();

        return view('admin.goodstransport.analysis',compact('flatbed','container','halfbody','mazda','shehzore','pickup'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         try {
            $reservations = Goodstransport::where([['status','saved'],['reservation_for','goods_and_transport']])->paginate(25);
            $customers = Customer::all();
            $drivers = Driver::all();
            $vehicles = Vehicle::all();
            $package_rates = Packagerate::all();
            $franchises = Franchise::all();
             return view('admin.goodstransport.index',compact('reservations','customers','drivers','vehicles','package_rates','franchises'));
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
        $package_rates = Packagerate::where('package_for','goodstransport')->get();
        $vehicles = Vehicle::where('availability','goodstransport')->get();
        $franchises = Franchise::all();
        return view('admin.goodstransport.create',compact('customers','drivers','package_rates','vehicles','franchises'));
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
            'vehicle_type' => 'required',
            'goods_type' => 'required',
            'pick_up_location' => 'required',
            'drop_off_location' => 'required',
            'weight_of_transport' => 'required',
            'rate_per_hour' => 'required',
            'vehicle_id' => 'required',
            'total_rate_amount'=>'required',
        ]);

        try {
            $goodstransport = new Goodstransport();
            $goodstransport->reservation_type =$request->reservation_type;
            $goodstransport->reservation_for =$request->reservation_for;
            $goodstransport->branch =$request->branch;
            $goodstransport->customer_id =$request->customer_id;
            $goodstransport->driver_id =$request->driver_id;
            $goodstransport->vehicle_type =$request->vehicle_type;
            $goodstransport->goods_type =$request->goods_type;
            $goodstransport->vehicle_id =$request->vehicle_id;
            $goodstransport->total_taxes_amount =$request->total_taxes_amount;
            $goodstransport->pick_up_location =$request->pick_up_location;
            $goodstransport->drop_off_location =$request->drop_off_location;
            $goodstransport->weight_of_transport =$request->weight_of_transport;
            $goodstransport->rate_per_hour =$request->rate_per_hour;
            $goodstransport->taxes_notes = $request->taxes_notes;
            $goodstransport->total_miscellaneous_charges =$request->total_miscellaneous_charges;
            $goodstransport->miscellaneous_charges_notes =$request->miscellaneous_charges_notes;
            $goodstransport->additional_charges =$request->additional_charges;
            $goodstransport->total_rate_amount = $request->total_rate_amount;
            $goodstransport->fuel_charges =$request->fuel_charges;
            $goodstransport->payment_method =$request->payment_method;
            $goodstransport->total_amount =$request->total_amount;
            if ($goodstransport->save()) {
                $reservatoin_preview_detail = Goodstransport::where('id',$goodstransport->id)->first();
                $customers = Customer::all();
                $drivers = Driver::all();
                $package_rates = Packagerate::all();
                $vehicles = Vehicle::all();
                $franchises = Franchise::all();
                return view('admin.goodstransport.preview',compact('reservatoin_preview_detail','customers','drivers','package_rates','vehicles','franchises'));
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
        $reservaiton_save = Goodstransport::where('id',$id)->first();
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
        return redirect()->route('goodstransport.index')->with('success','Goods & Tranport Reservation Saved Successfully'.' '.$array_data['statusmessage'] . ' '. 'To Customer & Driver Mobiles Number !');

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
            $editreservation = Goodstransport::where('id',$id)->first();
            $customers = Customer::all();
            $drivers = Driver::all();
            $package_rates = Packagerate::all();
            $vehicles = Vehicle::all();
            $franchises = Franchise::all();
            return view('admin.goodstransport.edit',compact('editreservation','customers','drivers','package_rates','vehicles','franchises'));
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
            'vehicle_type' => 'required',
            'goods_type' => 'required',
            'pick_up_location' => 'required',
            'drop_off_location' => 'required',
            'weight_of_transport' => 'required',
            'rate_per_hour' => 'required',
            'vehicle_id' => 'required',
            'total_rate_amount'=>'required',
        ]);

        try {
            $goodstransport = Goodstransport::where('id',$id)->first();
            $goodstransport->reservation_type =$request->reservation_type;
            $goodstransport->reservation_for =$request->reservation_for;
            $goodstransport->branch =$request->branch;
            $goodstransport->customer_id =$request->customer_id;
            $goodstransport->driver_id =$request->driver_id;
            $goodstransport->vehicle_type =$request->vehicle_type;
            $goodstransport->goods_type =$request->goods_type;
            $goodstransport->vehicle_id =$request->vehicle_id;
            $goodstransport->total_taxes_amount =$request->total_taxes_amount;
            $goodstransport->pick_up_location =$request->pick_up_location;
            $goodstransport->drop_off_location =$request->drop_off_location;
            $goodstransport->weight_of_transport =$request->weight_of_transport;
            $goodstransport->rate_per_hour =$request->rate_per_hour;
            $goodstransport->taxes_notes = $request->taxes_notes;
            $goodstransport->total_miscellaneous_charges =$request->total_miscellaneous_charges;
            $goodstransport->miscellaneous_charges_notes =$request->miscellaneous_charges_notes;
            $goodstransport->additional_charges =$request->additional_charges;
            $goodstransport->total_rate_amount = $request->total_rate_amount;
            $goodstransport->fuel_charges =$request->fuel_charges;
            $goodstransport->payment_method =$request->payment_method;
            $goodstransport->total_amount =$request->total_amount;
            if ($goodstransport->save()) {
                $reservatoin_preview_detail = Goodstransport::where('id',$goodstransport->id)->first();
                $customers = Customer::all();
                $drivers = Driver::all();
                $package_rates = Packagerate::all();
                $vehicles = Vehicle::all();
                $franchises = Franchise::all();
                return view('admin.goodstransport.preview',compact('reservatoin_preview_detail','customers','drivers','package_rates','vehicles','franchises'));
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
           $reservation = Goodstransport::findOrFail($id);
            if ($reservation->delete()) {
                return redirect()->back()->with('success','Goods & Transport Reservation Deleted Successfully');
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
            $reservation = Goodstransport::where('id',$id)->first();
            $vehicles = Vehicle::all();
            $customers = Customer::all();
            $drivers = Driver::all();
            $package_rates = Packagerate::all();
            $franchises = Franchise::all();
            $pdf = PDF::loadView('admin.goodstransport.invoice',compact('reservation','vehicles','customers','drivers','package_rates','franchises'));
            return $pdf->download('goodstransport.pdf');
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }

    //Print

    public function print($id)
    {
            $reservation = Goodstransport::where('id',$id)->first();
            $vehicles = Vehicle::all();
            $customers = Customer::all();
            $drivers = Driver::all();
            $package_rates = Packagerate::all();
            $franchises = Franchise::all();
            return view('admin.goodstransport.invoice',compact('reservation','vehicles','customers','drivers','package_rates','franchises'));
    }
}
