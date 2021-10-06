<?php

namespace App\Http\Controllers;

use App\Make;
use Illuminate\Http\Request;

class MakeController extends Controller
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
        $companies = Make::all();
        return view('admin.admincontrol.make.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('admin.admincontrol.make.create');
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
        ]);
        try {

            $company = new Make;
            $company->name =$request->name;

            if ($company->save()) {
                return redirect()->back()->with('success','Company Added Successfully');
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
     * @param  \App\Make  $make
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $editcompany = Make::where('id',$id)->first();
            return view('admin.admincontrol.make.edit',compact('editcompany'));
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Make  $make
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        try {

            $company = Make::where('id',$id)->first();
            $company->name =$request->name;

            if ($company->save()) {
                return redirect()->back()->with('success','Company Updated Successfully');
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
     * @param  \App\Make  $make
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $company = Make::findOrFail($id);
             if ($company->delete()) {
                 return redirect()->back()->with('success','Company Deleted Successfully');
             }
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }
}
