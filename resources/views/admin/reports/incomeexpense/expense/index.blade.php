@extends('layouts.app1')
@section('title','Expenses')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">All Expenses</h1>

    <div>
        <a href="{{ route('expenses.create') }}" class=" float-right ml-2 d-sm-inline-block btn btn-sm bg-success shadow-sm text-white"><i
        class="fas fa-plus fa-sm text-warning "></i> Add Expense </a>
        <a  href="{{ route('income_expense.create') }}"  class=" float-right mr-3 d-sm-inline-block btn btn-sm bg-dark shadow-sm text-white"><i
            class="fas fa-eye fa-sm text-success "></i> Manage Income/Expense </a>
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
                    <th>Date</th>
                    <th>Expense type</th>
                    <th>Amount</th>
                    <th>Details</th>
                    <th>Notes</th>
                    <th>Last Update</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @if(isset($expenses) && $expenses->count() > 0)
                @foreach($expenses as $key=> $expense)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$expense->date}}</td>
                    <td>{{$expense->expense_type}}</td>
                    <td>{{$expense->amount}}</td>
                    <td>{{$expense->details}}</td>
                    <td>{{$expense->notes}}</td>
                    <td>{{\Carbon\Carbon::parse($expense->updated_at)->diffForHumans()}}</td>
                    <td class="d-flex d-inline">
                        <a  href="{{ route('expenses.edit',$expense->id) }}" class="btn bg-success text-white btn-sm">Edit</a> |
                        <a class="btn bg-danger text-light btn-sm" href="{{ route('expenses.destroy',$expense->id) }}" >Delete</a>
                    </td>

                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="8" class="text-center"><strong>No, Expenses Found</strong></td>
                </tr>
                @endif

            </tbody>
        </table>

     </div>
    </div>




@endsection
