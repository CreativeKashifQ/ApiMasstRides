@extends('layouts.app1')
@section('content')
<!-- Begin Franchise Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Manage Booking At Workshop</h1>
        <a  href="{{ route('workshopvehicle.index') }}"  class="  btn btn-sm bg-dark shadow-sm text-white"><i
            class="fas fa-plus fa-sm text-success "></i> Show Workshop Vehicle </a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>
                        <a  href="{{ route('booking.create') }}"  class="  btn btn-sm bg-primary shadow-sm text-white"><i
                        class="fas fa-plus fa-sm text-success "></i> Create Booking </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <form action="{{ route('workshopvehicle.store') }}" method="POST" enctype="multipart/form-data" >
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
                    <strong>Add Vehicle</strong>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label>Vehicle Name</label>
                              <input type="text" name="vname" class="form-control" placeholder="Vehicle Name" value="{{old('vname')}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('vname')}}</span>
                          </div>
                    </div>
                </div>

                </div>

            </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn bg-success btn-sm rounded-0 text-white">Add Vehicle</button>
        </div>
    </form>

</div>
@endsection


