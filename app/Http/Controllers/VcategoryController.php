<?php

namespace App\Http\Controllers;

use App\Vcategory;
use Illuminate\Http\Request;

class VcategoryController extends Controller
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
        $vcategories = Vcategory::all();
        return view('admin.vcategory.index',compact('vcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('admin.vcategory.create');
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
            $vcategory = new Vcategory;
            $vcategory->name =$request->name;
            if ($vcategory->save()) {
                return redirect()->back()->with('success','Vehicle Category Added Successfully');
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
            $editvcategory = Vcategory::where('id',$id)->first();
            return view('admin.vcategory.edit',compact('editvcategory'));
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
    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required',
        ]);

        try {
            $vcategory = Vcategory::where('id',$request->id)->first();
            $vcategory->name =$request->name;
            if ($vcategory->save()) {
                return redirect()->back()->with('success','Vehicle Category Updated Successfully');
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
           $vcategory = Vcategory::findOrFail($id);
            if ($vcategory->forcedelete()) {
                return redirect()->back()->with('success','Vehicle Category Deleted Successfully');
            } 
       } catch (\Exception $e) {
           return $e->getmessage();
       }
    }
}
