<?php

namespace App\Http\Controllers;

use App\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
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
             $incomes = Income::all();
             return view('admin.reports.incomeexpense.income.index',compact('incomes'));
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
             return view('admin.reports.incomeexpense.income.create');
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
            'date' => 'required',
            'income' => 'required',
            'details' => 'required',
        ]);

        try {
            $income = new Income();
            $income->date =$request->date;
            $income->income =$request->income;
            $income->details =$request->details;
            if ($income->save()) {
                return redirect()->back()->with('success','Income Created Successfully');
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

            $editincome = Income::where('id',$id)->first();
            return view('admin.reports.incomeexpense.income.edit',compact('editincome'));
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
            'date' => 'required',
            'income' => 'required',
            'details' => 'required',
        ]);

        try {
            $income = Income::where('id',$id)->first();
            $income->date =$request->date;
            $income->income =$request->income;
            $income->details =$request->details;
            if ($income->save()) {
                return redirect()->back()->with('success','Income Updated Successfully');
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
           $income = Income::findOrFail($id);
            if ($income->delete()) {
                return redirect()->back()->with('success','Income Deleted Successfully');
            }
       } catch (\Exception $e) {
           return $e->getmessage();
       }
    }


}
