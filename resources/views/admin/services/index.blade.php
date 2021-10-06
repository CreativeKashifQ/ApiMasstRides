@extends('layouts.app1')
@section('title','Booking-Workshop')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Workshop Services Listing</h1>
        <div>
            <a  href="{{ route('service.create') }}"  class=" float-right d-sm-inline-block btn btn-sm bg-warning shadow-sm  text-dark"><i
                class="fas fa-eye fa-sm text-success "></i> Add Service </a>
            <a  href="{{ route('booking.create') }}"  class=" mr-3 float-right d-sm-inline-block btn btn-sm bg-dark shadow-sm text-white"><i
                    class="fas fa-plus fa-sm text-success "></i> Create Booking </a>
        </div>

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
                    <th>Service Name</th>
                    <th>Service Price</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @if(isset($services) && $services->count() > 0)
                @foreach($services as $key=> $service)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$service->name}}</td>
                    <td>{{$service->price}} Rs.</td>
                    <td>{{\Carbon\Carbon::parse($service->updated_at)->diffForHumans()}}</td>
                    <td class="d-flex d-inline">
                        <a  href="{{ route('service.edit',$service->id) }}" class="btn bg-success text-white btn-sm">Edit</a> |
                        <a class="btn bg-danger text-light btn-sm" href="{{ route('service.destroy',$service->id) }}" >Delete</a>
                    </td>

                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="7" class="text-center"><strong>No,Services Found For Workshop, Add first Service to Workshop</strong></td>
                </tr>
                @endif

            </tbody>
        </table>
     </div>
    </div>
@endsection
