<?php

namespace App\Http\Controllers;

use App\Mechanic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MechanicController extends Controller
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
            $mechanics = Mechanic::all();
             return view('admin.mechanic.index',compact('mechanics'));

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
        return view('admin.mechanic.create');
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
        ]);

        try {
            $mechanic = new Mechanic();
            $mechanic->name =$request->name;
            $mechanic->phone =$request->phone;
            if ($mechanic->save()) {
                return redirect()->back()->with('success','Mechanic Added Successfully');
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
            $editmechanic= Mechanic::where('id',$id)->first();
            return view('admin.mechanic.edit',compact('editmechanic'));
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
            'name' => 'required',
            'phone' => 'required',
        ]);

        try {
            $mechanic = Mechanic::where('id',$id)->first();
            $mechanic->name =$request->name;
            $mechanic->phone =$request->phone;
            if ($mechanic->save()) {
                return redirect()->back()->with('success','Mechanic Updated Successfully');
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
           $mechanic = Mechanic::findOrFail($id);
            if ($mechanic->delete()) {
                return redirect()->back()->with('success','Mechanic Deleted Successfully');
            }
       } catch (\Exception $e) {
           return $e->getmessage();
       }
    }
}
