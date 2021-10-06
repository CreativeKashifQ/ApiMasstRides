@extends('layouts.app1')
@section('content')
<!-- Begin Franchise Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Manage Vehicle Expenses </h1>
        <div>
        <a  href="{{ route('vehicleexpense.show',$id) }}"  class=" float-right d-sm-inline-block btn btn-sm bg-warning shadow-sm text-white"><i
        class="fas fa-eye fa-sm text-success "></i> Show Expenses </a>

        <a  href="{{ route('vehicleexpensetype.create') }}"  class=" float-right mr-3 d-sm-inline-block btn btn-sm bg-dark shadow-sm text-white"><i
        class="fas fa-plus fa-sm text-success "></i> Add Expense Type </a>
      </div>
    </div>
    
    <form action="{{ route('vehicleexpense.store') }}" method="POST" enctype="multipart/form-data" >
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
                  <input type="hidden" name="vehicleId" value="{{$id}}">
               

                 <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Select Date</label>
                              <input type="date" class="form-control" name="date" placeholder="Last Service" value="{{old('date')}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('date')}}</span>
                          </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Expense Type</label>
                              <select class="form-control" name="expense_id">
                                @foreach($vehicleexpensestype as $vehicleexpensetype)
                                <option value="{{$vehicleexpensetype->id}}" @if(old('expense_id') == $vehicleexpensetype->type) {{'selected'}} @endif >{{$vehicleexpensetype->type}}</option>
                                @endforeach
                              </select>
                              <span class="text-danger font-weight-bold">{{$errors->first('expense_id')}}</span>
                          </div>
                    </div>
                </div>

                  <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                                <label>Amount</label>
                              <input type="number" name="amount" class="form-control" placeholder="Rs." value="{{old('amount')}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('amount')}}</span>
                          </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Details</label>
                              <textarea class="form-control" cols="1" rows="1" name="details" placeholder="some details">{{old('details')}}</textarea>
                               <span class="text-danger font-weight-bold">{{$errors->first('details')}}</span>
                        </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                              <label>Important Note</label>
                             <textarea class="form-control" placeholder="any important note for vehicle related to vehicle" name="notes">{{old('notes')}}</textarea>
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
            <button type="submit"  class="btn bg-success btn-sm rounded-0 text-white">Add Vehicle Expense</button>
        </div>
    </form>
    
</div>
@endsection

@section('scripts')

 

@endsection