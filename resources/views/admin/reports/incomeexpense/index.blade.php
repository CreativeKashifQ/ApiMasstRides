@extends('layouts.app1')
@section('title','Booking-Workshop')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Income&Expense Management</h1>
        <div>
            <a href="{{ route('income_expense.create') }}" class=" float-right ml-2 d-sm-inline-block btn btn-sm bg-dark shadow-sm text-white"><i
            class="fas fa-plus fa-sm text-warning "></i> Manage Expense&Income </a>
        </div>

    </div>

    <div class="table-responsive">
         @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success ! </strong> {{Session::get('success')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            </div>
            @endif
       <table class="table   table-striped   " >
            <thead>
                <tr>
                    <th>#</th>
                    <th>All Expenses</th>
                    <th>Today Income</th>
                    <th>Profit/Lose</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @if(isset($incomeexpenses) && $incomeexpenses->count() > 0)
                @foreach($incomeexpenses as $key=> $incomeexpense)

                @php
                $expenseTotal = 0;
                $incomeTotal = 0;
                $expenseIds = json_decode($incomeexpense->expense);
                foreach($expenses as $expense){
                    if(in_array($expense->id, $expenseIds)){
                        $expenseTotal += $expense->amount;

                    }
                }
                foreach($incomes as $income){
                    if($income->id == $incomeexpense->income){
                        $incomeTotal = $income->income;
                    }
                }

                @endphp
                <tr>
                    <td>{{++$key}}</td>
                    <td>
                    @foreach($expenses as $expense)
                        @if(in_array($expense->id, $expenseIds)) {{$expense->expense_type}}(<b>{{$expense->amount}}</b>Rs.), @endif
                     @endforeach
                    </td>
                    <td>
                        @foreach($incomes as $income)
                        @if($income->id == $incomeexpense->income) {{$income->income}} Rs.  @endif
                        @endforeach
                    </td>
                    <td>
                        @if($incomeTotal > $expenseTotal)
                             {{$incomeTotal - $expenseTotal}} Rs. (Profit)
                        @else
                             {{$expenseTotal - $incomeTotal}}   Rs. (Lose)
                        @endif
                    </td>
                    <td>{{\Carbon\Carbon::parse($incomeexpense->updated_at)->diffForHumans()}}</td>
                    <td class="d-flex d-inline">
                        <a  href="{{ route('income_expense.edit',$incomeexpense->id) }}" class="btn bg-success text-white btn-sm">Edit</a> |
                        <a class="btn bg-danger text-light btn-sm" href="{{ route('income_expense.destroy',$incomeexpense->id) }}" >Delete</a>
                    </td>

                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="7" class="text-center"><strong>No,Expenses Found , Add Expenses and Income first</strong></td>
                </tr>
                @endif

            </tbody>
        </table>
     </div>
    </div>
@endsection
