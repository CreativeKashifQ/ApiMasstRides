@extends('layouts.app1')
@section('title','Booking-Workshop')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Accounting System</h1>
    </div>

         @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success ! </strong> {{Session::get('success')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            </div>
            @endif
    <div class="card">
        <div class="card-header">Accounts Management</div>
        <div class="card-body">
            <div class='row'>
                <div class="col-md-6 col-12">
                  <ul>
                      <li><a href="{{ route('income_expense.index') }}">Incomce & Expense Management System</a></li>
                      <li><a>Incomce & Expense</a></li>
                      <li><a>Incomce & Expense</a></li>
                  </ul>
                </div>

                <div class="col-md-6 col-12">
                  <li><a>Incomce & Expense</a></li>
                      <li><a>Incomce & Expense</a></li>
                      <li><a>Incomce & Expense</a></li>
              </div>

            </div>
        </div>
    </div>

    </div>
@endsection
