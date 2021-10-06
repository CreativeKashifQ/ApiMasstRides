<?php

namespace App\Http\Controllers;

use App\Vehicleexpense;
use App\Vehicleexpensetype;
use Illuminate\Http\Request;
use App\Vehicle;

class VehicleexpenseController extends Controller
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
    public function index($id)
    {
         try {
            $vehicleexpensestype = Vehicleexpensetype::all();
            $vehicleexpenses = Vehicle::findOrFail($id)->vehicleexpense;
             return view('admin.vehicleexpense.index',compact('vehicleexpenses','vehicleexpensestype','id'));
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

        try {
             $vehicleexpensestype = Vehicleexpensetype::all();
             return view('admin.vehicleexpense.create',compact('id','vehicleexpensestype'));
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
            'date' => 'required',
            'expense_id' => 'required',
            'amount' => 'required',
            'details' => 'required',
            'notes' => 'required',
            'vehicleId' => 'required',
        ]);

        try {
            $vehicleexpense = new Vehicleexpense;
            $vehicleexpense->vehicle_id = $request->vehicleId;
            $vehicleexpense->date =$request->date;
            $vehicleexpense->expense_id =$request->expense_id;
            $vehicleexpense->amount =$request->amount;
            $vehicleexpense->details =$request->details;
            $vehicleexpense->notes =$request->notes;
            if ($vehicleexpense->save()) {
                return redirect()->back()->with('success','Vehicle Expense Added Successfully');
            }else{
                return redirect()->back()->with('error','Occuring Error');
            }

        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Goodstransport  $goodstransport
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       try {

       } catch (\Exception $e) {

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
            $vehicleexpensestype = Vehicleexpensetype::all();
            $editvehicleexpense = Vehicleexpense::where('id',$id)->first();
            return view('admin.vehicleexpense.edit',compact('editvehicleexpense','vehicleexpensestype'));
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
            'date' => 'required',
            'expense_id' => 'required',
            'amount' => 'required',
            'details' => 'required',
            'notes' => 'required',
        ]);

        try {
            $vehicleexpense = Vehicleexpense::where('id',$id)->first();
            $vehicleexpense->date =$request->date;
            $vehicleexpense->expense_id =$request->expense_id;
            $vehicleexpense->amount =$request->amount;
            $vehicleexpense->details =$request->details;
            $vehicleexpense->notes =$request->notes;
            if ($vehicleexpense->save()) {
                return redirect()->back()->with('success','Vehicle Expense Updated Successfully');
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
           $vehicleexpense = Vehicleexpense::findOrFail($id);
            if ($vehicleexpense->delete()) {
                return redirect()->back()->with('success','Vehicle Expense Deleted Successfully');
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
    public function detail($id)
    {
        try {
           $tourtraveldetail = Tourtravel::findOrFail($id);
            return view('admin.tourtravel.details',compact('tourtraveldetail'));
       } catch (\Exception $e) {
           return $e->getmessage();
       }
    }
}
