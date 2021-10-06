@extends('layouts.app1')
@section('title','Expenses')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">All Incomes</h1>

    <div>
        <a href="{{ route('income.create') }}" class=" float-right ml-2 d-sm-inline-block btn btn-sm bg-success shadow-sm text-white"><i
        class="fas fa-plus fa-sm text-warning "></i> Add Income </a>
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
                    <th>Income</th>
                    <th>Details</th>
                    <th>Last Update</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @if(isset($incomes) && $incomes->count() > 0)
                @foreach($incomes as $key=> $income)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$income->date}}</td>
                    <td>{{$income->income}}</td>
                    <td>{{$income->details}}</td>
                    <td>{{\Carbon\Carbon::parse($income->updated_at)->diffForHumans()}}</td>
                    <td class="d-flex d-inline">
                        <a  href="{{ route('income.edit',$income->id) }}" class="btn bg-success text-white btn-sm">Edit</a> |
                        <a class="btn bg-danger text-light btn-sm" href="{{ route('income.destroy',$income->id) }}" >Delete</a>
                    </td>

                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="8" class="text-center"><strong>No, Income Found</strong></td>
                </tr>
                @endif

            </tbody>
        </table>

     </div>
    </div>




@endsection
