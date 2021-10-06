<?php

namespace App\Http\Controllers;

use App\Packagerate;
use Illuminate\Http\Request;

class PackagerateController extends Controller
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
            $package_rates = Packagerate::all();
             return view('admin.package_rate.index',compact('package_rates'));
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
        return view('admin.package_rate.create');
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
            'package_name' => 'required',
            'package_price' => 'required',
            'package_for' => 'required',
        ]);

        try {
            $pakcage_rate = new Packagerate();
            $pakcage_rate->package_name =$request->package_name;
            $pakcage_rate->package_price =$request->package_price;
            $pakcage_rate->package_for =$request->package_for;
            if ($pakcage_rate->save()) {
                return redirect()->back()->with('success','Package Added Successfully');
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
            $editpackage_rate= Packagerate::where('id',$id)->first();
            return view('admin.package_rate.edit',compact('editpackage_rate'));
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
            'package_name' => 'required',
            'package_price' => 'required',
            'package_for' => 'required',
        ]);

        try {
            $package_rate = Packagerate::where('id',$id)->first();
            $package_rate->package_name =$request->package_name;
            $package_rate->package_price =$request->package_price;
            $package_rate->package_for =$request->package_for;
            if ($package_rate->save()) {
                return redirect()->back()->with('success','Package Updated Successfully');
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
           $package_rate = Packagerate::findOrFail($id);
            if ($package_rate->delete()) {
                return redirect()->back()->with('success','Package Deleted Successfully');
            }
       } catch (\Exception $e) {
           return $e->getmessage();
       }
    }
}
