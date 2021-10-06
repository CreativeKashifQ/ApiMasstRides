<?php

namespace App\Http\Controllers;

use App\Franchise;
use Illuminate\Http\Request;
use Image;


class FranchiseController extends Controller
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
        $franchises = Franchise::all();
        return view('admin.franchise.index',compact('franchises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('admin.franchise.create');
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
            $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'cnic' => 'required',
            'address' => 'required',
            'city' => 'required',
            'subscription_days' => 'required',
            'paid_amount' => 'required',
            'paid_by' => 'required',
            'transaction_id' => 'required',
            'transaction_slip' => 'required',

        ]);

        try {
            $franchise = new Franchise($data);
            if($request->hasFile('transaction_slip')){
                $file = $request->file('transaction_slip');
                $filename= time().'.'.$file->getClientOriginalExtension();
                Image::make($file)->resize( 350, 200 )->save(public_path('images/uploads/transactionslips/'. $filename ));
            }
            $franchise->transaction_slip = $filename;
            if ($franchise->save()) {
                return redirect()->back()->with('success','Franchise Added Successfully');
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
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
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
            $editfranchise = Franchise::where('id',$id)->first();
            return view('admin.franchise.edit',compact('editfranchise'));
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

       $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'cnic' => 'required',
            'address' => 'required',
            'city' => 'required',
            'subscription_days' => 'required',
            'paid_amount' => 'required',
            'paid_by' => 'required',
            'transaction_id' => 'required',

        ]);

        try {
            $franchise =  Franchise::where('id',$request->id)->first();
            if($request->hasFile('transaction_slip')){
                $file = $request->file('transaction_slip');
                $filename= time().''.$file->getClientOriginalExtension();
                Image::make($file)->resize( 350, 200 )->save(public_path('images/uploads/transactionslips/'. $filename ));
                $franchise->transaction_slip = $filename;
                if ($franchise->update($data)) {
                    return redirect()->back()->with('success','Franchise Updated Successfully');
                }else{
                    return redirect()->back()->with('error','Occuring Error');
                }
            }else{
                $franchise->transaction_slip = $franchise->transaction_slip;
                if ($franchise->update($data)) {
                    return redirect()->back()->with('success','Franchise Updated With Previous Slip Successfully');
                }else{
                    return redirect()->back()->with('error','Occuring Error');
                }
            }
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }

    /**
     * Trash the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function trash($id)
    {

        try {
            $franchise = Franchise::where('id',$id)->first();
            if ($franchise->delete()) {
                return redirect()->back()->with('success','Franchise Trashed Successfully');
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
    public function trashed(Request $request)
    {
        try {

            $franchises = Franchise::onlyTrashed()->get();
            return view('admin.franchise.trashed',compact('franchises'));
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
    public function restore($id)
    {
        try {
            $franchise = Franchise::withTrashed()->findOrFail($id);
            if ($franchise->restore()) {
                return redirect()->back()->with('success','Franchise Restore Successfully');
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
           $franchise = Franchise::findOrFail($id);
            if ($franchise->forcedelete()) {
                return redirect()->back()->with('success','Franchise Deleted Successfully');
            }
       } catch (\Exception $e) {
           return $e->getmessage();
       }
    }
}
