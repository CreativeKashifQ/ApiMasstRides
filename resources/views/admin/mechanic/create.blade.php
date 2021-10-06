@extends('layouts.app1')
@section('content')
<!-- Begin Franchise Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Manage Mechanics At Workshop</h1>
        <div>
            <a  href="{{ route('mechanic.index') }}"  class=" float-right d-sm-inline-block btn btn-sm bg-warning shadow-sm  text-dark"><i
                class="fas fa-eye fa-sm text-success "></i> Show Mechanics </a>
            <a  href="{{ route('booking.create') }}"  class=" mr-3 float-right d-sm-inline-block btn btn-sm bg-dark shadow-sm text-white"><i
                    class="fas fa-plus fa-sm text-success "></i> Create Booking </a>
        </div>
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

    <form action="{{ route('mechanic.store') }}" method="POST" enctype="multipart/form-data" >
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
                    <strong>Add Mechanic</strong>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Add Mechanic Name</label>
                              <input type="text" name="name" class="form-control" placeholder="Mechanic Name" value="{{old('name')}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('name')}}</span>
                          </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Phone</label>
                              <input type="number" name="phone" class="form-control" placeholder="Mechanic Phone" value="{{old('phone')}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('phone')}}</span>
                          </div>
                    </div>
                </div>

                </div>

            </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn bg-success btn-sm rounded-0 text-white">Add Mechanic</button>
        </div>
    </form>

</div>
@endsection


