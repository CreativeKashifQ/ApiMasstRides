@extends('layouts.app1')
@section('content')
<!-- Begin Franchise Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Edit Package</h1>
        <div>
            <a  href="{{ route('package_rate.index') }}"  class=" float-right d-sm-inline-block btn btn-sm bg-warning shadow-sm  text-dark"><i
                class="fas fa-eye fa-sm text-success "></i> Show PackageRates </a>
            <a  href="{{ route('reservation.create') }}"  class=" mr-3 float-right d-sm-inline-block btn btn-sm bg-dark shadow-sm text-white"><i
                    class="fas fa-plus fa-sm text-success "></i> Add Reservation </a>
        </div>
    </div>


    <form action="{{ route('package_rate.update',$editpackage_rate->id) }}" method="POST" enctype="multipart/form-data" >
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
                    <strong>Edit Package Name And Price</strong>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label>Package Name</label>
                              <input type="text" name="package_name" class="form-control" placeholder="Multan to Karachi" value="{{old('package_name',$editpackage_rate->package_name)}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('package_name')}}</span>
                          </div>
                    </div>

                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label>Package Price/hr</label>
                              <input type="number" name="package_price" class="form-control" placeholder="Rs." value="{{old('package_price',$editpackage_rate->package_price)}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('package_price')}}</span>
                          </div>
                    </div>

                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label>Package For ?</label>
                              <select class="form-control" name="package_for">
                                  <option value="rentacar" @if($editpackage_rate->package_for == 'rentacar') {{'selected'}} @endif>RentACar</option>
                                  <option value="hourlyrides" @if($editpackage_rate->package_for == 'hourlyrides') {{'selected'}} @endif>HourlyRides</option>
                                  <option value="pickanddrop" @if($editpackage_rate->package_for == 'pickanddrop') {{'selected'}} @endif>Pick&Drop</option>
                              </select>
                              <span class="text-danger font-weight-bold">{{$errors->first('package_for')}}</span>
                          </div>
                    </div>
                </div>

                </div>

            </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn bg-success btn-sm rounded-0 text-white">Update Package</button>
        </div>
    </form>

</div>
@endsection


