<?php

namespace App\Http\Controllers;

use App\Vehiclerentalhistory;
use Illuminate\Http\Request;

class VehiclerentalhistoryController extends Controller
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
            $vehiclerentalhistories = Vehiclerentalhistory::all();
             return view('admin.vehiclerentalhistory.index',compact('vehiclerentalhistories'));
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
             return view('admin.vehiclerentalhistory.create');
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
            'fname' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'rent' => 'required',

        ]);

        try {
            $vehiclerentalhistory = new Vehiclerentalhistory;
            $vehiclerentalhistory->fname = $request->fname;
            $vehiclerentalhistory->start_date = $request->start_date;
            $vehiclerentalhistory->end_date = $request->end_date;
            $vehiclerentalhistory->rent = $request->rent;
            if ($vehiclerentalhistory->save()) {
                return redirect()->back()->with('success','Vehicle rental history added successfully');
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
            $editvehiclerentalhistory = Vehiclerentalhistory::where('id',$id)->first();
            return view('admin.vehiclerentalhistory.edit',compact('editvehiclerentalhistory'));
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
            'fname' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'rent' => 'required', 
        ]);

        try {
            $vehiclerentalhistory = Vehiclerentalhistory::findOrFail($id);
            $vehiclerentalhistory->fname = $request->fname;
            $vehiclerentalhistory->start_date = $request->start_date;
            $vehiclerentalhistory->end_date = $request->end_date;
            $vehiclerentalhistory->rent = $request->rent;
            if ($vehiclerentalhistory->save()) {
                return redirect()->back()->with('success','Vehicle rental history updated successfully');
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
           $vehiclerentalhistory = Vehiclerentalhistory::findOrFail($id);
            if ($vehiclerentalhistory->delete()) {
                return redirect()->back()->with('success','Vehicle Rental history Deleted Successfully');
            } 
       } catch (\Exception $e) {
           return $e->getmessage();
       }
    }
}
