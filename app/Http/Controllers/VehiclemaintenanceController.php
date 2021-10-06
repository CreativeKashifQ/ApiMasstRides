<?php

namespace App\Http\Controllers;

use App\Vehiclemaintenance;
use Illuminate\Http\Request;

class VehiclemaintenanceController extends Controller
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
            $vehiclemaintenance = Vehiclemaintenance::where('vmaintenance_id',$id)->first();
            $vehicleId = $id;
             return view('admin.vehiclemaintenance.index',compact('vehiclemaintenance','vehicleId'));
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
             $vehicleId = $id;
             return view('admin.vehiclemaintenance.create',compact('vehicleId'));
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
            'vehicleId' => 'required',
            'mlservive' => 'required',
            'imilage' => 'required',
            'lservicedate' => 'required',
            'nservicedate' => 'required',
            'ninspectiondate' => 'required',
            'icompany' => 'required',
            'texpirationdate' => 'required',
            'mottest' => 'required',
            'iexpirationdate' => 'required',
            'ipnumber' => 'required',
            'apaid' => 'required',
            'adue' => 'required',
        ]);

        try {
            $vehiclemaintenance = new Vehiclemaintenance;
            $vehiclemaintenance->vmaintenance_id =$request->vehicleId;
            $vehiclemaintenance->mlservive =$request->mlservive;
            $vehiclemaintenance->imilage =$request->imilage;
            $vehiclemaintenance->lservicedate =$request->lservicedate;
            $vehiclemaintenance->nservicedate =$request->nservicedate;
            $vehiclemaintenance->ninspectiondate =$request->ninspectiondate;
            $vehiclemaintenance->icompany =$request->icompany;
            $vehiclemaintenance->texpirationdate =$request->texpirationdate;
            $vehiclemaintenance->mottest =$request->mottest;
            $vehiclemaintenance->iexpirationdate =$request->iexpirationdate;
            $vehiclemaintenance->ipnumber =$request->ipnumber;
            $vehiclemaintenance->apaid =$request->apaid;
            $vehiclemaintenance->adue =$request->adue;
            if ($vehiclemaintenance->save()) {
                return redirect()->back()->with('success','Vehicle Maintenance Added Successfully');
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
            $editvehiclemaintenance = Vehiclemaintenance::where('id',$id)->first();
            $vmaintenanceId = $editvehiclemaintenance->vmaintenance_id;
            return view('admin.vehiclemaintenance.edit',compact('editvehiclemaintenance','vmaintenanceId'));
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

            'mlservive' => 'required',
            'imilage' => 'required',
            'lservicedate' => 'required',
            'nservicedate' => 'required',
            'ninspectiondate' => 'required',
            'icompany' => 'required',
            'texpirationdate' => 'required',
            'mottest' => 'required',
            'iexpirationdate' => 'required',
            'ipnumber' => 'required',
            'apaid' => 'required',
            'adue' => 'required',
        ]);

        try {
            $vehiclemaintenance = Vehiclemaintenance::where('id',$id)->first();
            $vmaintenanceId = $request->vmaintenanceId;
            $vehiclemaintenance->mlservive =$request->mlservive;
            $vehiclemaintenance->imilage =$request->imilage;
            $vehiclemaintenance->lservicedate =$request->lservicedate;
            $vehiclemaintenance->nservicedate =$request->nservicedate;
            $vehiclemaintenance->ninspectiondate =$request->ninspectiondate;
            $vehiclemaintenance->icompany =$request->icompany;
            $vehiclemaintenance->texpirationdate =$request->texpirationdate;
            $vehiclemaintenance->mottest =$request->mottest;
            $vehiclemaintenance->iexpirationdate =$request->iexpirationdate;
            $vehiclemaintenance->ipnumber =$request->ipnumber;
            $vehiclemaintenance->apaid =$request->apaid;
            $vehiclemaintenance->adue =$request->adue;
            if ($vehiclemaintenance->save()) {
                return redirect()->route('vehiclemaintenance.show',$vmaintenanceId)->with('success','Vehicle Maintenance Updated Successfully');
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
           $tourtravelvehicle = Tourtravel::findOrFail($id);
            if ($tourtravelvehicle->delete()) {
                return redirect()->back()->with('success','Tourtravel Planning Deleted Successfully');
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
