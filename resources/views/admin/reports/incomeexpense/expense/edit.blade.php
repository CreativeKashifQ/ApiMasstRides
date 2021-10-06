@extends('layouts.app1')
@section('content')
<!-- Begin Franchise Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Edit Expenses </h1>
        <div>
        <a  href="{{ route('expenses.index') }}"  class=" float-right d-sm-inline-block btn btn-sm bg-warning shadow-sm text-white"><i
        class="fas fa-eye fa-sm text-success "></i> Show Expenses </a>
        <a  href="{{ route('income_expense.create') }}"  class=" float-right mr-3 d-sm-inline-block btn btn-sm bg-dark shadow-sm text-white"><i
            class="fas fa-eye fa-sm text-success "></i> Manage Income/Expense </a>
      </div>
    </div>

    <form action="{{ route('expenses.update',$editexpense->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="modal-body">
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success ! </strong> {{Session::get('success')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            </div>
            @endif

            @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error ! </strong> {{Session::get('error')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            </div>
            @endif
        <div class="row">
            <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <strong>Expenses Manegement</strong>
                </div>

                <div class="card-body">

                 <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Select Date</label>
                              <input type="date" class="form-control" name="date"  value="{{old('date',$editexpense->date)}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('date')}}</span>
                          </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Expense Type</label>
                            <input type="text" class="form-control" name="expense_type" placeholder="eg. oil change" value="{{old('expense_type',$editexpense->expense_type)}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('expense_type')}}</span>
                          </div>
                    </div>
                </div>

                  <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                                <label>Amount</label>
                              <input type="number" name="amount" class="form-control" placeholder="Rs." value="{{old('amount',$editexpense->amount)}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('amount')}}</span>
                          </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Details</label>
                              <textarea class="form-control" cols="1" rows="1" name="details" placeholder="Some Detals">{{old('details',$editexpense->details)}}</textarea>
                               <span class="text-danger font-weight-bold">{{$errors->first('details')}}</span>
                        </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                              <label>Important Note</label>
                             <textarea class="form-control" placeholder="Any Important Note For Expense" name="notes">{{old('notes',$editexpense->notes)}}</textarea>
                              <span class="text-danger font-weight-bold" >{{$errors->first('notes')}}</span>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>

        </div>

        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn bg-success btn-sm rounded-0 text-white">Update Expense</button>
        </div>
    </form>

</div>
@endsection

@section('scripts')



@endsection
