@extends('layouts.app1')
@section('title',"Rental History")
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Vehicle Rental History Record</h1>
    <div>
        <a href="{{ route('vehiclerentalhistory.create') }}" class=" float-right ml-2 d-sm-inline-block btn btn-sm bg-success shadow-sm text-white"><i
        class="fas fa-plus fa-sm text-warning "></i> Add RentalHistory </a>
        <a href="{{ route('vehiclemanagement.show') }}" class=" float-right d-sm-inline-block btn btn-sm bg-dark shadow-sm text-white"><i
        class="fas fa-eye fa-sm text-warning "></i> Vehicle Management Show</a>
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
                    <th>Full Name</th>
                    <th>Strat Date</th>
                    <th>End Date</th>
                    <th>Rent</th>
                    <th>Last Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @if(isset($vehiclerentalhistories) && $vehiclerentalhistories->count() > 0)
                @foreach($vehiclerentalhistories as $key=> $vehiclerentalhistory)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$vehiclerentalhistory->fname}}</td>
                    <td>{{$vehiclerentalhistory->start_date}}</td>
                    <td>{{$vehiclerentalhistory->end_date}}</td>
                    <td>{{$vehiclerentalhistory->rent}}</td>
                    <td>{{\Carbon\Carbon::parse($vehiclerentalhistory->updated_at)->diffForHumans()}}</td>
                    <td class="d-flex d-inline">

                        <a  href="{{ route('vehiclerentalhistory.edit',$vehiclerentalhistory->id) }}" class="btn bg-success text-white btn-sm">Edit</a> |
                        <a class="btn bg-danger text-light btn-sm" href="{{ route('vehiclerentalhistory.destroy',$vehiclerentalhistory->id) }}" >Delete</a>
                    </td>

                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="7" class="text-center"><strong>No,Vehicles Rental History Found</strong></td>
                </tr>
                @endif

            </tbody>
        </table>

     </div>
    </div>




@endsection
