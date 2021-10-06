<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Customer;
use App\Product;
use App\Mechanic;
use App\Workshopvehicle;
use Illuminate\Http\Request;
use App\Service;
use PDF;

use function GuzzleHttp\json_encode;

class BookingController extends Controller
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
            $bookings = Booking::all();
            $workshopvehicles = Workshopvehicle::all();
            $customers = Customer::all();
            $services = Service::all();
            $products = Product::all();
            $mechanics = Mechanic::all();
            return view('admin.booking.index',compact('bookings','workshopvehicles','customers','services','products','mechanics'));
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }

    public function invoice($id)
    {
         try {
            $booking = Booking::where('id',$id)->first();
            $workshopvehicles = Workshopvehicle::all();
            $customers = Customer::all();
            $services = Service::all();
            $products = Product::all();
            $mechanics = Mechanic::all();
            $pdf = PDF::loadView('admin.booking.invoice',compact('booking','workshopvehicles','customers','services','products','mechanics'));
            return $pdf->download('bookinginvoice.pdf');
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
            $workshopvehicles = Workshopvehicle::all();
            $customers = Customer::all();
            $services = Service::all();
            $products = Product::all();
            $mechanics = Mechanic::all();
             return view('admin.booking.create',compact('workshopvehicles','customers','services','products','mechanics'));
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
            'customerId' => 'required',
            'workshopvehicleId' => 'required',
            'servicesIds' => 'required',
            'productsIds' => 'required',
            'mechanicsIds' => 'required',
            'phone' => 'required',
            'location' => 'required',

        ]);

        try {

            $booking = new Booking;
            $booking->customer_id =$request->customerId;
            $booking->workshopvehicle_id =$request->workshopvehicleId;
            $booking->service_id = json_encode($request->servicesIds);
            $booking->product_id = json_encode($request->productsIds);
            $booking->mechanic_id = json_encode($request->mechanicsIds);
            $booking->phone =$request->phone;
            $booking->location =$request->location;
            if ($booking->save()) {
                $input_xml = '<SMSRequest>
                <Username>03028510615</Username>
                <Password>Jazz@123</Password>
                <From>MASST RIDES</From>
                <To>'.$request->phone.'</To>
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
                return redirect()->back()->with('success','Booking Added &'.' '. $array_data['statusmessage'].' '.'To Mobile'.' '.$request->phone);
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
     * @param  \App\Goodstransport  $goodstransport
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        try {
            $editbooking = Booking::where('id',$id)->first();
            $workshopvehicles = Workshopvehicle::all();
            $customers = Customer::all();
            $services = Service::all();
            $mechanics = Mechanic::all();
            $products = Product::all();
            return view('admin.booking.edit',compact('editbooking','workshopvehicles','customers','services','mechanics','products'));
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
            'customerId' => 'required',
            'workshopvehicleId' => 'required',
            'servicesIds' => 'required',
            'productsIds' => 'required',
            'mechanicsIds' => 'required',
            'phone' => 'required',
            'location' => 'required',

        ]);

        try {

            $booking = Booking::where('id',$id)->first();
            $booking->customer_id =$request->customerId;
            $booking->workshopvehicle_id =$request->workshopvehicleId;
            $booking->service_id = json_encode($request->servicesIds);
            $booking->product_id = json_encode($request->productsIds);
            $booking->mechanic_id = json_encode($request->mechanicsIds);
            $booking->phone =$request->phone;
            $booking->location =$request->location;

            if ($booking->save()) {
                return redirect()->back()->with('success','Booking Updated Successfully');
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
           $booking = Booking::findOrFail($id);
            if ($booking->delete()) {
                return redirect()->back()->with('success','Booking Deleted Successfully');
            }
       } catch (\Exception $e) {
           return $e->getmessage();
       }
    }

}
