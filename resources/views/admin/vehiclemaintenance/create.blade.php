@extends('layouts.app1')
@section('content')
<!-- Begin Franchise Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Manage Vehicle Maintenance</h1>
        <a  href="{{ route('vehiclemaintenance.show',$vehicleId) }}"  class=" float-right d-sm-inline-block btn btn-sm bg-warning shadow-sm text-white"><i
        class="fas fa-eye fa-sm text-success "></i> Show Maintenance </a>
    </div>
    
    <form action="{{ route('vehiclemaintenance.store') }}" method="POST" enctype="multipart/form-data" >
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
                    <strong>Maintenance Manegement</strong>
                </div>

                <div class="card-body">
                  <input type="hidden" name="vehicleId" value="{{$vehicleId}}">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Mileage at Last Service</label>
                              <input type="text" name="mlservive" class="form-control" placeholder="Milage" value="{{old('mlservice')}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('mlservice')}}</span>
                          </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Service Interval Mileage</label>
                              <input type="text" name="imilage" class="form-control" value="{{old('imilage')}}" placeholder="Service Interval Mileage">
                              <span class="text-danger font-weight-bold">{{$errors->first('imilage')}}</span>
                          </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Last Service Date</label>
                              <input type="date" name="lservicedate" class="form-control" placeholder="Last Service" value="{{old('lservicedate')}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('email')}}</span>
                          </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Next Service Date</label>
                              <input type="date" name="nservicedate" class="form-control" placeholder="Next Service Date" value="{{old('nservicedate')}}" >
                              <span class="text-danger font-weight-bold">{{$errors->first('nservicedate')}}</span>
                          </div>
                    </div>
                </div>

                  <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                                <label>Next Inspection Date</label>
                              <input type="date" name="ninspectiondate" class="form-control" placeholder="Next Inspection Date" value="{{old('ninspectiondate')}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('ninspectiondate')}}</span>
                          </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Insurance Company</label>
                              <input type="text" name="icompany" class="form-control" placeholder="Insurance Company" value="{{old('icompany')}}">
                               <span class="text-danger font-weight-bold">{{$errors->first('icompany')}}</span>
                          </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                                <label>Tex Expiration Date</label>
                              <input type="date" name="texpirationdate" class="form-control" placeholder="Tex Expiration Date" value="{{old('texpirationdate')}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('texpirationdate')}}</span>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                         <div class="form-group">
                            <label>Next M.O.T Test</label>
                              <input type="date" name="mottest" class="form-control" placeholder="M.O.T Test" value="{{old('mottest')}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('mottest')}}</span>
                          </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-12">
                         <div class="form-group">
                                <label>Insurance Expiration Date</label>
                              <input type="date" name="iexpirationdate" class="form-control" placeholder="Insurance Expiration Date" value="{{old('iexpirationdate')}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('iexpirationdate')}}</span>
                          </div>
                    </div>
                    <div class="col-md-6 col-12">
                         <div class="form-group">
                            <label>Insurance Policy Number#</label>
                              <input type="text" name="ipnumber" class="form-control" placeholder="Insurance Policy Number" value="{{old('ipnumber')}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('ipnumber')}}</span>
                          </div>
                    </div>
                </div>

                  <div class="row">
                    <div class="col-md-6 col-12">
                         <div class="form-group">
                              <label>Amount Paid</label>
                              <input type="number" name="apaid" class="form-control" placeholder="Ammount Paid" value="{{old('apaid')}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('apaid')}}</span>
                          </div>
                    </div>
                    <div class="col-md-6 col-12">
                         <div class="form-group">
                            <label>Amount Due</label>
                              <input type="number" name="adue" class="form-control" placeholder="Due Amount" value="{{old('adue')}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('adue')}}</span>
                          </div>
                    </div>
                </div>

                </div>

            </div>
            </div>

        </div> 

        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn bg-success btn-sm rounded-0 text-white">Add Vehicle Maintenance</button>
        </div>
    </form>
    
</div>
@endsection

@section('scripts')

 

@endsection