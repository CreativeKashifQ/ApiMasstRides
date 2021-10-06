@extends('layouts.app1')
@section('title','Admin-Control')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Admin Control Management System</h1>
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
        <div class="card-header">System Management</div>
        <div class="card-body">
            <div class='row'>
                <div class="col-md-6 col-12">
                  <ul>
                      <li><a href="{{ route('package_rate.index') }}">Make Package Name With Price and Rates</a></li>
                      <li><a href="{{ route('make.index') }}">Make(Company) Management</a></li>
                      <li><a href="{{ route('engine.index') }}">Engine Power Mangement</a></li>
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

    <div class="card">
        <div class="card-header">Courier Mangement</div>
        <div class="card-body">
            <div class='row'>
                <div class="col-md-6 col-12">
                  <ul>
                      <li><a href="{{ route('couriertype.list') }}">Mange Courier Types</a></li>
                      <li><a href="{{ route('couriercontent.list') }}">Manage Content</a></li>
                      <li><a href="{{ route('courierweight.list') }}">Manage Weight</a></li>
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
