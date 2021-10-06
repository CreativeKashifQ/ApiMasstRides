<?php

namespace App\Http\Controllers;

use App\Incomeexpense;
use App\Expense;
use App\Income;
use Illuminate\Http\Request;

class IncomeexpenseController extends Controller
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
             $incomeexpenses = Incomeexpense::all();
             $expenses = Expense::all();
             $incomes = Income::all();
             return view('admin.reports.incomeexpense.index',compact('incomeexpenses','expenses','incomes'));
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
                $expenses = Expense::all();
                $incomes = Income::all();
             return view('admin.reports.incomeexpense.create',compact('expenses','incomes'));
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
            'expenseIds' => 'required',
            'incomeId' => 'required',
        ]);

        try {
            $incomeexpense = new Incomeexpense();
            $incomeexpense->expense = json_encode($request->expenseIds);
            $incomeexpense->income =$request->incomeId;
            if ($incomeexpense->save()) {
                return redirect()->back()->with('success','Inocme/Expense Added Successfully');
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
            $expenses = Expense::all();
            $incomes = Income::all();
            $editincomeexpense = Incomeexpense::where('id',$id)->first();
            return view('admin.reports.incomeexpense.edit',compact('editincomeexpense','expenses','incomes'));
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
            'expenseIds' => 'required',
            'incomeId' => 'required',
        ]);

        try {
            $incomeexpense = Incomeexpense::where('id',$id)->first();
            $incomeexpense->expense = json_encode($request->expenseIds);
            $incomeexpense->income =$request->incomeId;
            if ($incomeexpense->save()) {
                return redirect()->back()->with('success','Inocme/Expense Updated Successfully');
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
           $incomeexpense = Incomeexpense::findOrFail($id);
            if ($incomeexpense->delete()) {
                return redirect()->back()->with('success','Income/Expense Deleted Successfully');
            }
       } catch (\Exception $e) {
           return $e->getmessage();
       }
    }


}
