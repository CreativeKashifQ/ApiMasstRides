@extends('layouts.app1')
@section('content')
<!-- Begin Franchise Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Edit Income </h1>
        <div>
        <a  href="{{ route('income.index') }}"  class=" float-right d-sm-inline-block btn btn-sm bg-warning shadow-sm text-white"><i
        class="fas fa-eye fa-sm text-success "></i> Show Incomes </a>
        <a  href="{{ route('income_expense.create') }}"  class=" float-right mr-3 d-sm-inline-block btn btn-sm bg-dark shadow-sm text-white"><i
            class="fas fa-eye fa-sm text-success "></i> Manage Income/Expense </a>
      </div>
    </div>

    <form action="{{ route('income.update',$editincome->id) }}" method="POST" enctype="multipart/form-data" >
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
                              <input type="date" class="form-control" name="date"  value="{{old('date',$editincome->date)}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('date')}}</span>
                          </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Income</label>
                            <input type="number" class="form-control" name="income" placeholder="Rs." value="{{old('income',$editincome->income)}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('income')}}</span>
                          </div>
                    </div>
                </div>

                  <div class="row">

                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label>Details</label>
                              <textarea class="form-control" cols="1" rows="1" name="details" placeholder="Some Detals">{{old('details',$editincome->details)}}</textarea>
                               <span class="text-danger font-weight-bold">{{$errors->first('details')}}</span>
                        </div>
                    </div>
                </div>


                </div>
            </div>
            </div>

        </div>

        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn bg-success btn-sm rounded-0 text-white">Update Today Income</button>
        </div>
    </form>

</div>
@endsection

@section('scripts')



@endsection
