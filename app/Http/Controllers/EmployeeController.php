<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
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
        $employees = Employee::all();
        return view('admin.employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('admin.employee.create');
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
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        try {
            $employee = new Employee;
            $employee->name =$request->name;
            $employee->email = $request->email;
            $employee->phone =$request->phone;
            $employee->message = $request->message;
            if ($employee->save()) {
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
                return redirect()->back()->with('success','Empleyee Added &'.' '. $array_data['statusmessage'].' '.'To Employee Mobile'.' '.$request->phone);
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
            $editemployee = Employee::where('id',$id)->first();
            return view('admin.employee.edit',compact('editemployee'));
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
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        try {
            $driver = Employee::where('id',$id)->first();
            $driver->name =$request->name;
            $driver->email = $request->email;
            $driver->phone =$request->phone;
            $driver->message = $request->message;
            if ($driver->save()) {
                return redirect()->back()->with('success','Employee Updated Successfully');
            }else{
                return redirect()->back()->with('error','Occuring Error');
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
           $employee = Employee::findOrFail($id);
            if ($employee->delete()) {
                return redirect()->back()->with('success','Employee Deleted Successfully');
            }
       } catch (\Exception $e) {
           return $e->getmessage();
       }
    }
}
