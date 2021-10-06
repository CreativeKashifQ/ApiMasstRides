<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
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
             $expenses = Expense::all();
             return view('admin.reports.incomeexpense.expense.index',compact('expenses'));
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
        return view('admin.reports.incomeexpense.expense.create');
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
            'expense_type' => 'required',
            'amount' => 'required',
            'details' => 'required',
            'notes' => 'required',
        ]);

        try {
            $expense = new Expense();
            $expense->date =$request->date;
            $expense->expense_type =$request->expense_type;
            $expense->amount =$request->amount;
            $expense->details =$request->details;
            $expense->notes =$request->notes;
            if ($expense->save()) {
                return redirect()->back()->with('success','Expense Added Successfully');
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
            $editexpense = Expense::where('id',$id)->first();
            return view('admin.reports.incomeexpense.expense.edit',compact('editexpense'));
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
            'expense_type' => 'required',
            'amount' => 'required',
            'details' => 'required',
            'notes' => 'required',
        ]);

        try {
            $expense = Expense::where('id',$id)->first();
            $expense->date =$request->date;
            $expense->expense_type =$request->expense_type;
            $expense->amount =$request->amount;
            $expense->details =$request->details;
            $expense->notes =$request->notes;
            if ($expense->save()) {
                return redirect()->back()->with('success','Expense Updated Successfully');
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
           $expense = Expense::findOrFail($id);
            if ($expense->delete()) {
                return redirect()->back()->with('success','Expense Deleted Successfully');
            }
       } catch (\Exception $e) {
           return $e->getmessage();
       }
    }
}
