<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;
use Image;

class DriverController extends Controller
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
        $drivers = Driver::all();
        return view('admin.driver.index',compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('admin.driver.create');
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
            'name' => 'required',
            'phone' => 'required',
            'driver_images'=>'required',
            'lisence_image' => 'required',
        ]);

        try {
            if($request->hasFile('driver_images')){
                foreach ($request->file('driver_images') as $key => $driver_image ) {
                    $random = rand(111111111,999999999);
                    $filename = $random . '.' . $driver_image->getClientOriginalExtension();
                    Image::make( $driver_image )->resize( 350, 200 )->save(public_path('images/uploads/drivers/'. $filename ));
                    $data[] = $filename;
                }
            }

            $lisence_image = $request->file('lisence_image');
                $random = rand(111111111,999999999);
                $lisence_filename = $random . '.' . $lisence_image->getClientOriginalExtension();
                Image::make( $lisence_image )->resize( 200, 200 )->save(public_path('images/uploads/drivers/'. $lisence_filename ));
            $driver = new Driver;
            $driver->name =$request->name;
            $driver->email = $request->email;
            $driver->phone =$request->phone;
            $driver->driver_images = json_encode($data);
            $driver->lisence_image = $lisence_filename;
            if ($driver->save()) {
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
                return redirect()->back()->with('success','Driver Added &'.' '. $array_data['statusmessage'].' '.'To Driver Mobile'.' '.$request->phone);
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
            $editdriver = Driver::where('id',$id)->first();
            return view('admin.driver.edit',compact('editdriver'));
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
            'name' => 'required',
            'phone' => 'required',
        ]);

        try {
            if($request->hasFile('driver_images') && $request->hasFile('lisence_image')){
                foreach ($request->file('driver_images') as $key => $driver_image ) {
                    $random = rand(111111111,999999999);
                    $filename = $random . '.' . $driver_image->getClientOriginalExtension();
                    Image::make( $driver_image )->resize( 350, 200 )->save(public_path('images/uploads/drivers/'. $filename ));
                    $data[] = $filename;
                }

                $lisence_image = $request->file('lisence_image');
                $random = rand(111111111,999999999);
                $lisence_filename = $random . '.' . $lisence_image->getClientOriginalExtension();
                Image::make( $lisence_image )->resize( 200, 200 )->save(public_path('images/uploads/drivers/'. $lisence_filename ));

                $driver = Driver::where('id',$id)->first();
                $driver->name =$request->name;
                $driver->email = $request->email;
                $driver->phone =$request->phone;
                $driver->driver_images = json_encode($data);
                $driver->lisence_image = $lisence_filename;
                if ($driver->save()) {
                    return redirect()->back()->with('success','Driver Updated Successfully');
                }else{
                    return redirect()->back()->with('error','Occuring Error');
                }
            } elseif(!$request->hasFile('driver_images')) {

                $lisence_image = $request->file('lisence_image');
                $random = rand(111111111,999999999);
                $lisence_filename = $random . '.' . $lisence_image->getClientOriginalExtension();
                Image::make( $lisence_image )->resize( 200, 200 )->save(public_path('images/uploads/drivers/'. $lisence_filename ));

                $driver = Driver::where('id',$id)->first();
                $driver->name =$request->name;
                $driver->email = $request->email;
                $driver->phone =$request->phone;
                $driver->driver_images = $driver->driver_images;
                $driver->lisence_image = $lisence_filename;
                if ($driver->save()) {
                    return redirect()->back()->with('success','Driver Upated With Previous Driver & New Lisence Image Successfully');
                }else{
                    return redirect()->back()->with('error','Occuring Error');
                }
            }elseif(!$request->hasFile('lisence_image')){

                foreach ($request->file('driver_images') as $key => $driver_image ) {
                    $random = rand(111111111,999999999);
                    $filename = $random . '.' . $driver_image->getClientOriginalExtension();
                    Image::make( $driver_image )->resize( 350, 200 )->save(public_path('images/uploads/drivers/'. $filename ));
                    $data[] = $filename;
                }
                $driver = Driver::where('id',$id)->first();
                $driver->name =$request->name;
                $driver->email = $request->email;
                $driver->phone =$request->phone;
                $driver->driver_images = json_encode($data);
                $driver->lisence_image = $driver->lisence_image;
                if ($driver->save()) {
                    return redirect()->back()->with('success','Driver Upated With Previous Lisence & New Driver Images Successfully');
                }else{
                    return redirect()->back()->with('error','Occuring Error');
                }
            }
            else{
                $driver = Driver::where('id',$id)->first();
                $driver->name =$request->name;
                $driver->email = $request->email;
                $driver->phone =$request->phone;
                $driver->driver_images = $driver->driver_images;
                $driver->lisence_image = $driver->lisence_image;
                if ($driver->save()) {
                    return redirect()->back()->with('success','Driver Upated With Previous Images Successfully');
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
           $driver = Driver::findOrFail($id);
            if ($driver->delete()) {
                return redirect()->back()->with('success','Driver Deleted Successfully');
            }
       } catch (\Exception $e) {
           return $e->getmessage();
       }
    }
}
