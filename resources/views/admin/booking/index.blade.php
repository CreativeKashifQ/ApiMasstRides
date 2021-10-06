@extends('layouts.app1')
@section('title','Booking-Workshop')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Workshop Booking Listing</h1>
        <a href="{{ route('booking.create') }}" class=" float-right d-sm-inline-block btn btn-sm bg-success shadow-sm text-white"><i
        class="fas fa-plus fa-sm text-warning "></i> Add Booking </a>

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
                    <th>Customer Name</th>
                    <th>Vehicle Name</th>
                    <th>Service</th>
                    <th>Products</th>
                    <th>Total Amount</th>
                    <th>Machanic Name</th>
                    <th>Customer Phone</th>
                    <th>Location</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                @if(isset($bookings) && $bookings->count() > 0)
                @foreach($bookings as $key=> $booking)
                @php
                      $service_ids = json_decode($booking->service_id);
                      $product_ids = json_decode($booking->product_id);
                      $mechanic_ids = json_decode($booking->mechanic_id);
                      $totalservicesprice = 0;
                      $totalproductsprice = 0;
                      foreach($products as $product){
                           if(in_array($product->id, $product_ids)){
                           $totalproductsprice += $product->price;
                           }
                      }
                      foreach($services as $service){
                           if(in_array($service->id, $service_ids)){
                           $totalservicesprice += $service->price;
                           }
                      }

                      $total = $totalproductsprice + $totalservicesprice;


                @endphp
                <tr>
                    <td>{{++$key}}</td>
                    <td>
                        @foreach($customers as $customer)
                        @if($customer->id  == $booking->customer_id){{$customer->name}} @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($workshopvehicles as $workshopvehicle)
                        @if($workshopvehicle->id == $booking->workshopvehicle_id){{$workshopvehicle->vname}} @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($services as $service)
                           @if(in_array($service->id, $service_ids)) {{$service->name}}(<b>{{$service->price}}</b>Rs.), @endif
                        @endforeach
                    </td>

                    <td>
                        @foreach($products as $product)
                           @if(in_array($product->id, $product_ids)) {{$product->name}}(<b>{{$product->price}}</b>Rs.), @endif
                        @endforeach
                    </td>
                     <td>
                        <b>{{$total}}</b> Rs.
                    </td>
                    <td>
                        @foreach($mechanics as $mechanic)
                        @if(in_array($mechanic->id, $mechanic_ids)) {{$mechanic->name}}({{$mechanic->phone}}), @endif
                        @endforeach
                    </td>
                    <td>{{$booking->phone}}</td>
                    <td>{{$booking->location}}</td>
                    <td>{{\Carbon\Carbon::parse($booking->updated_at)->diffForHumans()}}</td>
                    <td class="d-flex d-inline">
                        <a  href="{{ route('booking.edit',$booking->id) }}" class="btn bg-success text-white btn-sm">Edit</a> |
                        <a class="btn bg-danger text-light btn-sm" href="{{ route('booking.destroy',$booking->id) }}" >Delete</a>|
                        <a class="btn bg-dark text-light btn-sm" href="{{ route('booking.invoice',$booking->id) }}" >Invoice</a>
                    </td>

                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="11" class="text-center"><strong>No,Vehicles Found For Workshop, Add first Vehicle to Workshop</strong></td>
                </tr>
                @endif

            </tbody>
        </table>
     </div>
    </div>
@endsection
