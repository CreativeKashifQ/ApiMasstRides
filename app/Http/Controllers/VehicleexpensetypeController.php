<?php

namespace App\Http\Controllers;

use App\Vehicleexpensetype;
use Illuminate\Http\Request;

class VehicleexpensetypeController extends Controller
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
            $vehicleexpensestype = Vehicleexpensetype::all();
             return view('admin.vehicleexpensetype.index',compact('vehicleexpensestype'));
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
             return view('admin.vehicleexpensetype.create');
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
            'type' => 'required', 
        ]);

        try {
            $vehicleexpensetype = new Vehicleexpensetype;
            $vehicleexpensetype->type = $request->type;
            if ($vehicleexpensetype->save()) {
                return redirect()->back()->with('success','Vehicle Expense Type Added Successfully');
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
            $editvehicleexpensetype = Vehicleexpensetype::where('id',$id)->first();
            return view('admin.vehicleexpensetype.edit',compact('editvehicleexpensetype'));
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
            'type' => 'required',
           
        ]);

        try {
            $vehicleexpensetype = Vehicleexpensetype::where('id',$id)->first();
            $vehicleexpensetype->type = $request->type;
            if ($vehicleexpensetype->save()) {
                return redirect()->back()->with('success','Vehicle Expense Type Updated Successfully');
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
           $vehicleexpensetype = Vehicleexpensetype::findOrFail($id);
            if ($vehicleexpensetype->delete()) {
                return redirect()->back()->with('success','Vehicle Expense Type Deleted Successfully');
            } 
       } catch (\Exception $e) {
           return $e->getmessage();
       }
    }

    
}
