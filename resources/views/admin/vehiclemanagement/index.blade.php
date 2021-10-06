@extends('layouts.app1')
@section('title','goodstransport-management')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Vehicles Management Listing</h1>
        <a href="{{ route('vehicle.create') }}" class=" float-right d-sm-inline-block btn btn-sm bg-success shadow-sm text-white"><i
        class="fas fa-plus fa-sm text-warning "></i> Add Vehicle </a>

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
       <table class="table   table-striped   " >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @if(isset($vehicles) && $vehicles->count() > 0)
                @foreach($vehicles as $key=> $vehicle)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$vehicle->name}}</td>
                    <td><img class="img-thumbnail" style="width: 75px; height: 75px;" src="{{ asset('images/uploads/cars'.$vehicle->image) }}"></td>
                    <td>{{\Carbon\Carbon::parse($vehicle->updated_at)->diffForHumans()}}</td>
                    <td class="d-flex d-inline">
                        <a  href="{{ route('vehiclemaintenance.show',$vehicle->id) }}" class="btn bg-dark text-light btn-sm">Maintenance</a> |
                        {{-- <a  href="{{ route('tourtravel.detail',$vehicle->id) }}" class="btn bg-primary text-light btn-sm">DemageReport</a> | --}}
                        <a  href="{{ route('vehicleexpense.show',$vehicle->id) }}" class="btn bg-secondary text-light btn-sm">VehicleExpense</a> |
                        <a  href="{{ route('vehiclerentalhistory.show',$vehicle->id) }}" class="btn bg-info text-light btn-sm">RentalHistory</a> |
                        <a  href="{{ route('vehicle.edit',$vehicle->id) }}" class="btn bg-success text-white btn-sm">Edit/Detail</a> |
                        <a class="btn bg-danger text-light btn-sm" href="{{ route('vehicle.destroy',$vehicle->id) }}" >Delete</a>
                    </td>

                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5" class="text-center"><strong>No,Vehicles Found For Management, Add first Vehicle to Management</strong></td>
                </tr>
                @endif

            </tbody>
        </table>
     </div>
    </div>




@endsection
