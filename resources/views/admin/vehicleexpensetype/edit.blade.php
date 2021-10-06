@extends('layouts.app1')
@section('content')
<!-- Begin Franchise Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-color-black">Edit Vehicle Expenses Type </h1>
    <div>
      <a  href="{{ route('vehicleexpensetype.show') }}"  class=" float-right d-sm-inline-block btn btn-sm bg-warning shadow-sm text-white"><i
      class="fas fa-eye fa-sm text-success "></i> Show Expense Types </a>
    </div>
  </div>
  
  <form action="{{ route('vehicleexpensetype.update',$editvehicleexpensetype->id) }}" method="POST" enctype="multipart/form-data" >
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
              <strong>Expenses Type Management</strong>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <label>Add Type</label>
                    <input type="text" class="form-control" name="type" placeholder="type,eg. repair,service" value="{{old('type',$editvehicleexpensetype->type)}}">
                    <span class="text-danger font-weight-bold">{{$errors->first('type')}}</span>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="submit"  class="btn bg-success btn-sm rounded-0 text-white">Update Vehicle Expense Type</button>
    </div>
  </form>
  
</div>
@endsection
@section('scripts')

@endsection