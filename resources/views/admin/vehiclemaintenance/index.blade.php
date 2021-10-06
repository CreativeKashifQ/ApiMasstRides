@extends('layouts.app1')
@section('title','goodstransport-management')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Vehicle Maintenance Record</h1>
        @if(@$vehiclemaintenance == null)
    <div>
        <a href="{{ route('vehiclemaintenance.create',@$vehicleId) }}" class=" float-right ml-2 d-sm-inline-block btn btn-sm bg-success shadow-sm text-white"><i
        class="fas fa-plus fa-sm text-warning "></i> Add Maintenance </a>
        <a href="{{ route('vehiclemanagement.show') }}" class=" float-right d-sm-inline-block btn btn-sm bg-dark shadow-sm text-white"><i
        class="fas fa-eye fa-sm text-warning "></i> Vehicle Management</a>
    </div>
        @else
    <div>
        <a href="{{ route('vehiclemaintenance.edit',$vehiclemaintenance->id) }}" class=" float-right d-sm-inline-block  btn btn-sm bg-dark shadow-sm text-white"><i
        class="fas fa-plus fa-sm text-warning "></i> Update Maintenance </a>
        <a href="{{ route('vehiclemanagement.show') }}" class=" float-right mr-2 d-sm-inline-block btn btn-sm bg-success shadow-sm text-white"><i
        class="fas fa-plus fa-sm text-warning "></i> Vehicle Management </a>
    </div>
        @endif
       
       
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
      {{-- Display Property Overview and Description start --}}
    <section class="mt-5 ">
      <div class="row">
        
        <div class="col-md-12 col-12">
          <div class="card">
            <div class="card-header">
              
              <h5 class="float-left">Vehicle Maintenance</h5>
              <div class="float-right"><strong class="mr-2 text_blue">Last Updated:</strong>{{\Carbon\Carbon::parse(@$vehiclemaintenance->updated_at)->diffForHumans()}}</div>
              
            </div>
            <div class="card-body  ">
              <h5 class="font-weight-bold">Overview</h5>
              <div class="table-responsive">
              <table class="table table-striped">
                <tbody class="preview">
                 <tr>
                    <td><i class="fa fa-tachometer pr-2"></i> Mileage at Last Service: </td>
                    <td><strong>{{@$vehiclemaintenance->mlservive}} Km</strong></td>
                    <td><i class="fa fa-tachometer pr-2"></i> Service Interval Mileage: </td>
                    <td><strong>{{@$vehiclemaintenance->imilage}} Km</strong></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-calendar pr-2"></i> Last Service Date: </td>
                    <td><strong>{{@$vehiclemaintenance->lservicedate}}</strong></td>
                     <td><i class="fa fa-calendar pr-2"></i> Next Service Date: </td>
                    <td><strong>{{@$vehiclemaintenance->nservicedate}}</strong></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-calendar pr-2"></i> Next Inspection Date: </td>
                    <td><strong>{{@$vehiclemaintenance->ninspectiondate}}</strong></td>
                    <td><i class="fa fa-calendar pr-2"></i> Tex Expiration Date: </td>
                    <td><strong>{{@$vehiclemaintenance->texpirationdate}}</strong></td>
                  </tr>
                  <tr>
                   
                    
                  </tr>
                  <tr>
                    <td><i class="fa fa-calendar pr-2"></i> Next M.O.T Test Date: </td>
                    <td><strong>{{@$vehiclemaintenance->mottest}}</strong></td>
                    <td><i class="fa fa-calendar pr-2"></i>Insurance Expiration Date: </td>
                    <td><strong>{{@$vehiclemaintenance->iexpirationdate}}</strong></td>
                  </tr>

                   <tr>
                    <td><i class="fa fa-lock pr-2"></i> Insurance Policy Number: </td>
                    <td><strong>{{@$vehiclemaintenance->ipnumber}}</strong></td>
                     <td><i class="fa fa-building pr-2"></i> Insurance Company </td>
                    <td><strong>{{@$vehiclemaintenance->icompany}}</strong></td>
                   
                  </tr>
                   <tr>
                     <td><i class="fa fa-money pr-2"></i>Paid Amount: </td>
                    <td><strong>{{@$vehiclemaintenance->apaid}}</strong></td>
                    <td><i class="fa fa-money pr-2"></i> Due Amount: </td>
                    <td><strong>{{@$vehiclemaintenance->adue}}</strong></td>
                  </tr>
                </tbody>
              </table>
              <div>

          </div>
        </div>
      </div>
     
    </section>
    {{-- Display Property View and Description end --}}
    
     </div>
    </div>




@endsection