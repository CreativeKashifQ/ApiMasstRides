@extends('layouts.app1')
@section('content')
<!-- Begin Franchise Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Manage Income & Expense</h1>
        <a  href="{{ route('income_expense.index') }}"  class="  btn btn-sm bg-dark shadow-sm text-white"><i
            class="fas fa-plus fa-sm text-success "></i> Show Income/Expenses </a>

    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>
                        <a  href="{{ route('expenses.create') }}"  class="  btn btn-sm bg-primary shadow-sm text-white"><i
                        class="fas fa-plus fa-sm text-success "></i> Add Expenses </a>
                        |
                        <a  href="{{ route('income.index') }}"  class="  btn btn-sm bg-success shadow-sm text-white"><i
                            class="fas fa-plus fa-sm text-white "></i>Add Incomes </a>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>

    <form action="{{ route('income_expense.store') }}" method="POST" enctype="multipart/form-data" >
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
                    <strong>Manage Expenses</strong>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Select Expenses</label>
                            <select class="form-control js-add-incomeExpenses-multiple" name="expenseIds[]"  multiple="multiple">
                                <option value="">Select Expenses</option>
                                @foreach($expenses as $expense)
                                <option value="{{$expense->id}}"  >{{$expense->expense_type}}({{$expense->amount}})</option>
                                @endforeach
                            </select>
                              <span class="text-danger font-weight-bold">{{$errors->first('expenseIds')}}</span>
                          </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Select Income</label>
                            <select class="form-control" name ='incomeId'>
                                <option >Select Today Income</option>
                                @foreach($incomes as $income)
                                <option value="{{$income->id}}">Rs. {{$income->income}} ( Date: {{$income->date}})</option>
                                @endforeach
                            </select>
                              <span class="text-danger font-weight-bold">{{$errors->first('incomeId')}}</span>
                          </div>
                    </div>
                </div>

                </div>

            </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn bg-success btn-sm rounded-0 text-white">Create Income/Expense Detail</button>
        </div>
    </form>

</div>
@endsection

@section('scripts')

 <!--SLIDER 2 CDN LINKS -->
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <script>
   $(document).ready(function() {
 $('.js-add-incomeExpenses-multiple').select2({ width: '100%',});
 });
 </script>

@endsection
