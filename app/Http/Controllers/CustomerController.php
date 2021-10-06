<?php

namespace App\Http\Controllers;


use Image;
use App\Customer;
use Illuminate\Http\Request;
use App\Helpers\Tpl;

class CustomerController extends Controller
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
        $customers = Customer::all();
        return view('admin.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('admin.customer.create');
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
            'email' => 'required',
            'phone' => 'required',
            'state' => 'required',
            'city' => 'required',
        ]);

        try {
            $customer = new Customer;
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->country = $request->country;
            $customer->state = $request->state;
            $customer->city = $request->city;
            if ($customer->save()) {
                $result = Tpl::sendSms($customer->phone);
                return redirect()->back()->with('success', 'Customer Added &' . ' ' . $result['statusmessage'] . ' ' . 'To Customer Mobile' . ' ' . $request->phone);
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
            $editcustomer = Customer::where('id', $id)->first();
            return view('admin.customer.edit', compact('editcustomer'));
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
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'state' => 'required',
            'city' => 'required',
        ]);

        try {
            $customer = Customer::findOrFail($id);
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->country = $request->country;
            $customer->state = $request->state;
            $customer->city = $request->city;
            if ($customer->save()) {
              $result = Tpl::sendSms($request->phone);
                return redirect()->back()->with('success', 'Customer Added &' . ' ' . $result['statusmessage'] . ' ' . 'To Customer Mobile' . ' ' . $request->phone);
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
            $customer = Customer::findOrFail($id);
            if ($customer->forcedelete()) {
                return redirect()->back()->with('success', 'Customer Deleted Successfully');
            }
        } catch (\Exception $e) {
            return $e->getmessage();
        }
    }
}
