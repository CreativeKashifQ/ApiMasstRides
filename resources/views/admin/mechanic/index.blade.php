@extends('layouts.app1')
@section('title','Booking-Workshop')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Workshop Mechanics Listing</h1>
        <div>
            <a  href="{{ route('mechanic.create') }}"  class=" float-right d-sm-inline-block btn btn-sm bg-warning shadow-sm  text-dark"><i
                class="fas fa-eye fa-sm text-success "></i> Add Mechanic </a>
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
                    <th>Mechanic Name</th>
                    <th>Phone</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @if(isset($mechanics) && $mechanics->count() > 0)
                @foreach($mechanics as $key=> $mechanic)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$mechanic->name}}</td>
                    <td>{{$mechanic->phone}}</td>
                    <td>{{\Carbon\Carbon::parse($mechanic->updated_at)->diffForHumans()}}</td>
                    <td class="d-flex d-inline">
                        <a  href="{{ route('mechanic.edit',$mechanic->id) }}" class="btn bg-success text-white btn-sm">Edit</a> |
                        <a class="btn bg-danger text-light btn-sm" href="{{ route('mechanic.destroy',$mechanic->id) }}" >Delete</a>
                    </td>

                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="7" class="text-center"><strong>No,mechanics Found For Workshop, Add first mechanic to Workshop</strong></td>
                </tr>
                @endif

            </tbody>
        </table>
     </div>
    </div>
@endsection
