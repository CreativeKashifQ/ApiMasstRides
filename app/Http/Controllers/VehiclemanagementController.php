<?php

namespace App\Http\Controllers;

use App\Vehiclemanagement;
use App\Vehicle;
use Illuminate\Http\Request;

class VehiclemanagementController extends Controller
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
            $vehiclemanagement = Vehiclemanagement::all();
            $vehicles = Vehicle::all();
             return view('admin.vehiclemanagement.index',compact('vehiclemanagement','vehicles'));
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
            $vehicles = Vehicle::where('availability','tourstravel')->get();
             return view('admin.tourtravel.create',compact('vehicles'));
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
            'tt_id' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'depdate' => 'required',
            'deptime' => 'required',
            'arrivaldate' => 'required',
            'arrivaltime' => 'required',
            'passengers' => 'required',
            'destination' => 'required',
        ]);

        try {
            $tourtravel = new Tourtravel;
            $tourtravel->tt_id =$request->tt_id;
            $tourtravel->fname =$request->fname;
            $tourtravel->lname =$request->lname;
            $tourtravel->email =$request->email;
            $tourtravel->phone =$request->phone;
            $tourtravel->depdate =$request->depdate;
            $tourtravel->deptime =$request->deptime;
            $tourtravel->arrivaldate =$request->arrivaldate;
            $tourtravel->arrivaltime =$request->arrivaltime;
            $tourtravel->passengers =$request->passengers;
            $tourtravel->destination =$request->destination;
            if ($tourtravel->save()) {
                return redirect()->back()->with('success','Tour&Travels Planning Added Successfully');
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
    public function show(Goodstransport $goodstransport)
    {
        //
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
            $edittourtravel = Tourtravel::where('id',$id)->first();
            $vehicles = Vehicle::all();
            return view('admin.tourtravel.edit',compact('edittourtravel','vehicles'));
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
            'tt_id' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'depdate' => 'required',
            'deptime' => 'required',
            'arrivaldate' => 'required',
            'arrivaltime' => 'required',
            'passengers' => 'required',
            'destination' => 'required',
        ]);

        try {
            $tourtravel = Tourtravel::where('id',$id)->first();
            $tourtravel->tt_id =$request->tt_id;
            $tourtravel->fname =$request->fname;
            $tourtravel->lname =$request->lname;
            $tourtravel->email =$request->email;
            $tourtravel->phone =$request->phone;
            $tourtravel->depdate =$request->depdate;
            $tourtravel->deptime =$request->deptime;
            $tourtravel->arrivaldate =$request->arrivaldate;
            $tourtravel->arrivaltime =$request->arrivaltime;
            $tourtravel->passengers =$request->passengers;
            $tourtravel->destination =$request->destination;
            if ($tourtravel->save()) {
                return redirect()->back()->with('success','Tour&Travels Planning Updated Successfully');
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
