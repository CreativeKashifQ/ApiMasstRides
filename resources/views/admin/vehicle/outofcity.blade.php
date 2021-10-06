@extends('layouts.app1')
@section('title','vehicle-listing')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    @include('admin.vehicle.buttons')

   <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <h1 class="h3 mb-0 text-color-black">OurOfCity Vehicles</h1>
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
                    <th>Stock#</th>
                    <th>Reg#</th>
                    <th>VIN</th>
                    <th>Make</th>
                    <th>Type</th>
                    <th>Color</th>
                    <th>Weight</th>
                    <th>Trnasmisson</th>
                    <th>Engine</th>
                    <th>Fule/Charg</th>
                    <th>First/Date</th>
                    <th>Sold/Date</th>
                    <th>Purchase/Price</th>
                    <th>Sale/Price</th>
                    <th>Availability</th>
                    <th>Branch</th>
                    <th>Name</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Location</th>
                    <th>VCategoty</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Image</th>
                    <th>message</th>
                    <th>Updated/Date</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>
                @if(isset($vehicles) && $vehicles->count() > 0)
                @foreach($vehicles as $key=> $vehicle)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$vehicle->stocknumber}}</td>
                    <td>{{$vehicle->regno}}</td>
                    <td>{{$vehicle->vin}}</td>
                    <td>{{$vehicle->make}}</td>
                    <td>{{$vehicle->type}}</td>
                    <td>{{$vehicle->color}}</td>
                    <td>{{$vehicle->weight}}</td>
                    <td>{{$vehicle->transmission}}</td>
                    <td>{{$vehicle->engine}}</td>
                    <td>{{$vehicle->fuel_charg}}</td>
                    <td>{{$vehicle->first_date}}</td>
                    <td>{{$vehicle->sold_date}}</td>
                    <td>{{$vehicle->purchase_price}}</td>
                    <td>{{$vehicle->sale_price}}</td>
                    <td>{{$vehicle->availability}}</td>
                    <td>{{$vehicle->branch}}</td>
                    <td>{{$vehicle->name}}</td>
                    <td>{{$vehicle->model}}</td>
                    <td>{{$vehicle->year}}</td>
                    <td>{{$vehicle->location}}</td>
                    <td>{{$vehicle->vcategory}}</td>
                    <td>{{$vehicle->country}}</td>
                    <td>{{$vehicle->city}}</td>
                    <td><img class="img-thumbnail" src="{{ asset('resources/uploads/cars'.$vehicle->image) }}"></td>
                    <td>{{$vehicle->message}}</td>
                    <td>{{\Carbon\Carbon::parse($vehicle->updated_at)->diffForHumans()}}</td>
                    <td class="d-flex d-inline">
                        <a  href="{{ route('vehicle.edit',$vehicle->id) }}" class="btn bg-success text-white btn-sm">Edit</a> |
                        <a class="btn bg-danger text-light btn-sm" href="{{ route('vehicle.destroy',$vehicle->id) }}" >Delete</a>
                    </td>
                    
                </tr>

                @endforeach
                @else
                <tr>
                    <td colspan="30" class="text-center"><strong>No,OutOfCity Vehicles Found</strong></td>
                </tr>
                @endif
                
            </tbody>
        </table>
     </div>
    </div>




@endsection