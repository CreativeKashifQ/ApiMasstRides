@extends('layouts.app1')
@section('title','Booking-Workshop')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Hourly Rides Reservations Listing</h1>
        <a href="{{ route('hourlyrides.create') }}" class=" float-right d-sm-inline-block btn btn-sm bg-success shadow-sm text-white"><i
        class="fas fa-plus fa-sm text-warning "></i> Add Hourly Ride Reservation </a>

    </div>

    <div class="table-responsive">
        @if(Session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success ! </strong> {{session('success')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
        </div>
        @endif
       <table class="table   table-striped   " >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Reservation Type</th>
                    <th>Reservation_For</th>
                    <th>Branch/Franchise</th>
                    <th>Customer</th>
                    <th>Driver</th>
                    <th>Package/Price</th>
                    <th>vehicle</th>
                    <th>TotalTaxesAmount</th>
                    <th>Taxes Notes</th>
                    <th>Total/Miscellaneous_Charges</th>
                    <th>Miscellaneous_Charges Notes</th>
                    <th>Total/Hours</th>
                    <th>Hourly Rate</th>
                    <th>Total/Hourly/Price</th>
                    <th>Additional Charges</th>
                    <th>FueleCharges</th>
                    <th>Payment Method</th>
                    <th>Total Amount</th>
                    <th>Updated Date</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody>

                @if(isset($reservations) && $reservations->count() > 0)
                @foreach($reservations as $key=> $reservation)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$reservation->reservation_type}}</td>
                    <td>{{$reservation->reservation_for}}</td>
                    <td>
                        @foreach($franchises as $franchise)
                        @if($franchise->id == $reservation->branch){{$franchise->name}}@endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($customers as $customer)
                        @if($customer->id == $reservation->customer_id){{$customer->name}}@endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($drivers as $driver)
                        @if($driver->id == $reservation->driver_id){{$driver->name}},{{$driver->phone}},{{$driver->email}}@endif
                        @endforeach
                    </td>

                    <td>
                        @foreach($package_rates as $package_rate)
                        @if($package_rate->id == $reservation->package_rate_id) ({{$package_rate->package_name}},{{$package_rate->package_price}} Rs.),@endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($vehicles as $vehicle)
                        @if($vehicle->id == $reservation->vehicle_id){{$vehicle->name}}@endif
                        @endforeach
                    </td>
                    <td>{{$reservation->total_taxes_amount}}</td>
                    <td>{{$reservation->taxes_notes}}</td>
                    <td>{{$reservation->total_miscellaneous_charges}}</td>
                    <td>{{$reservation->miscellaneous_charges_notes}}</td>
                    <td>{{$reservation->total_hours}}</td>
                    <td>{{$reservation->hourly_rate_amount}}</td>
                    <td>{{$reservation->total_rate_amount}}</td>
                    <td>{{$reservation->additional_charges}}</td>
                    <td>{{$reservation->fuel_charges}}</td>
                    <td>{{$reservation->payment_method}}</td>
                    <td>{{$reservation->total_amount}}</td>
                    <td>{{\Carbon\Carbon::parse($reservation->updated_at)->diffForHumans()}}</td>
                    <td class="d-flex d-inline">
                        <a  href="{{ route('hourlyrides.edit',$reservation->id) }}" class="btn bg-success text-white btn-sm">Edit</a> |
                        <a class="btn bg-danger text-light btn-sm" href="{{ route('hourlyrides.destroy',$reservation->id) }}" >Delete</a>|
                        <a class="btn bg-dark text-light btn-sm" href="{{ route('hourlyrides.invoice',$reservation->id) }}" >Invoice</a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="22" class="text-center"><strong>No,Reservation Found, Add Reservations First</strong></td>
                </tr>
                @endif

            </tbody>
        </table>
        {{$reservations->links()}}
     </div>
    </div>
@endsection
