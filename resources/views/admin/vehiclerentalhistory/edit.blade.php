@extends('layouts.app1')
@section('content')
<!-- Begin Franchise Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-color-black">Edit Vehicle History Rent </h1>
    <div>
      <a  href="{{ route('vehiclerentalhistory.show') }}"  class=" float-right d-sm-inline-block btn btn-sm bg-warning shadow-sm text-white"><i
      class="fas fa-eye fa-sm text-success "></i> Show Rental History </a>
    </div>
  </div>
  
  <form action="{{ route('vehiclerentalhistory.update',$editvehiclerentalhistory->id) }}" method="POST" enctype="multipart/form-data" >
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
              <strong>Vehicle Rental History Management</strong>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label>Customer Full Name</label>
                    <input type="text" class="form-control" name="fname" placeholder="Full Name" value="{{old('fname',$editvehiclerentalhistory->fname)}}">
                    <span class="text-danger font-weight-bold">{{$errors->first('fname')}}</span>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label>Rent</label>
                    <input type="number" class="form-control" name="rent" placeholder="Rs." value="{{old('rent',$editvehiclerentalhistory->rent)}}">
                    <span class="text-danger font-weight-bold">{{$errors->first('rent')}}</span>
                  </div>
                </div>
                
              </div>

                <div class="row">
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label>Start Date</label>
                    <input type="date" class="form-control" name="start_date" placeholder="first date for rent" value="{{old('start_date',$editvehiclerentalhistory->start_date)}}">
                    <span class="text-danger font-weight-bold">{{$errors->first('start_date')}}</span>
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label>End Date</label>
                    <input type="date" class="form-control" name="end_date" placeholder="last date for rent" value="{{old('end_date',$editvehiclerentalhistory->end_date)}}">
                    <span class="text-danger font-weight-bold">{{$errors->first('end_date')}}</span>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit"  class="btn bg-success btn-sm rounded-0 text-white">Update Rental History</button>
    </div>
  </form>
  
</div>
@endsection
