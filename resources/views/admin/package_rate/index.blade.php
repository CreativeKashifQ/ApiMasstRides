@extends('layouts.app1')
@section('title','Booking-Workshop')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Package Name And Rates Listing</h1>
        <div>
            <a  href="{{ route('package_rate.create') }}"  class=" float-right d-sm-inline-block btn btn-sm bg-warning shadow-sm  text-dark"><i
                class="fas fa-eye fa-sm text-success "></i> Add Package </a>
            <a  href="{{ route('reservation.create') }}"  class=" mr-3 float-right d-sm-inline-block btn btn-sm bg-dark shadow-sm text-white"><i
                    class="fas fa-plus fa-sm text-success "></i> Add Reservation </a>
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
                    <th>Package Name</th>
                    <th>Rate/Price</th>
                    <th>Package For</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @if(isset($package_rates) && $package_rates->count() > 0)
                @foreach($package_rates as $key=> $package_rate)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$package_rate->package_name}}</td>
                    <td>{{$package_rate->package_price}}  Rs.</td>
                    <td class="text-uppercase">{{$package_rate->package_for}}</td>
                    <td>{{\Carbon\Carbon::parse($package_rate->updated_at)->diffForHumans()}}</td>
                    <td class="d-flex d-inline">
                        <a  href="{{ route('package_rate.edit',$package_rate->id) }}" class="btn bg-success text-white btn-sm">Edit</a> |
                        <a class="btn bg-danger text-light btn-sm" href="{{ route('package_rate.destroy',$package_rate->id) }}" >Delete</a>
                    </td>

                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="7" class="text-center"><strong>No,Packages/Price Found, Add first Package For Reservation</strong></td>
                </tr>
                @endif

            </tbody>
        </table>
     </div>
    </div>
@endsection
