<?php

namespace App\Http\Controllers;

use App\Engine;
use Illuminate\Http\Request;

class EngineController extends Controller
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
        $engines = Engine::all();
        return view('admin.admincontrol.engine.index',compact('engines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('admin.admincontrol.engine.create');
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
            'power' => 'required',
        ]);
        try {

            $engine = new Engine;
            $engine->power =$request->power;

            if ($engine->save()) {
                return redirect()->back()->with('success','Engine Power Added Successfully');
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
            $editengine = Engine::where('id',$id)->first();
            return view('admin.admincontrol.engine.edit',compact('editengine'));
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
            'power' => 'required',
        ]);
        try {

            $engine = Engine::where('id',$id)->first();
            $engine->power =$request->power;

            if ($engine->save()) {
                return redirect()->back()->with('success','Engine Power Updated Successfully');
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
            $engine = Engine::findOrFail($id);
             if ($engine->delete()) {
                 return redirect()->back()->with('success','Engine Power Deleted Successfully');
             }
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }
}
