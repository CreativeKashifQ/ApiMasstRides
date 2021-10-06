<?php

namespace App\Http\Controllers;

use App\Workshopvehicle;
use Illuminate\Http\Request;

class WorkshopvehicleController extends Controller
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
            $workshopvehicles = Workshopvehicle::all();
             return view('admin.workshopvehicle.index',compact('workshopvehicles'));
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
        return view('admin.workshopvehicle.create');
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
            'vname' => 'required',
        ]);

        try {
            $workshopvehicle = new Workshopvehicle();
            $workshopvehicle->vname =$request->vname;
            if ($workshopvehicle->save()) {
                return redirect()->back()->with('success','Vehicle Added Successfully');
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
            $editworkshopvehicle = Workshopvehicle::where('id',$id)->first();
            return view('admin.workshopvehicle.edit',compact('editworkshopvehicle'));
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
            'vname' => 'required',
        ]);

        try {
            $workshopvehicle = Workshopvehicle::where('id',$id)->first();
            $workshopvehicle->vname =$request->vname;
            if ($workshopvehicle->save()) {
                return redirect()->back()->with('success','Vehicle Updated Successfully');
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
           $workshopvehicle = Workshopvehicle::findOrFail($id);
            if ($workshopvehicle->delete()) {
                return redirect()->back()->with('success','Vehicle Deleted Successfully');
            }
       } catch (\Exception $e) {
           return $e->getmessage();
       }
    }

}
