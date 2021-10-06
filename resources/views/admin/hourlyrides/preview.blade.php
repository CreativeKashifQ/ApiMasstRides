@extends('layouts.app1')
@section('content')
<!-- Begin Franchise Content -->
<div class="container-fluid">

        <div class="modal-body">
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success ! </strong> {{Session::get('success')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            </div>
            @endif
            <div class="card">
                <div class="card-header font-weight-bold">Hourly Rides Reservation Preview</div>
                <div class="card-body">
                   <div class="row">
                    <div class="mx-auto">

                        <a href="{{ route('hourlyrides.save',$reservatoin_preview_detail->id) }}" class="btn btn-success btn-sm">Save Reservation</a>
                        <a href="{{ route('hourlyrides.edit', $reservatoin_preview_detail->id) }}" class="btn btn-dark btn-sm">Edit Reservation</a>
                        <a href="{{ route('hourlyrides.invoice', $reservatoin_preview_detail->id) }}" class="btn btn-primary btn-sm">Download Invoice</a>
                    </div>
                   </div>
                </div>
            </div>
            <div id="printPage">
        <div class="row mt-4">
            <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <strong>Rental Information</strong>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <strong>Reservation type =></strong>

                          </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <h3>{{$reservatoin_preview_detail->reservation_type}}</h3>
                          </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <strong>Reservation For =></strong>

                          </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <h3>{{$reservatoin_preview_detail->reservation_for}}</h3>
                          </div>
                    </div>
                </div>



                <div class="row">

                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <strong>Branch Name :</strong>
                            @if(isset($franchises))
                            @foreach($franchises as $franchise)
                             @if($franchise->id == $reservatoin_preview_detail->branch) <h3>{{$franchise->name}}</h3> @endif
                            @endforeach
                            @endif
                          </div>
                    </div>
                </div>

                </div>

            </div>
            </div>

            <div class="col-md-6 col-12">


            <div class="card">
                <div class="card-header font-weight-bold">Customer Information</div>
                <div class="card-body">
                    @foreach($customers as $customer)
                    @if($customer->id == $reservatoin_preview_detail->customer_id)
                        <div class="row">
                            <div class="col-md-6 col-6">
                                <strong>Customer Name :</strong>
                            </div>

                            <div class="col-md-6 col-6">
                                <h4>{{$customer->name}}</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-6">
                                <strong>Customer Email :</strong>
                            </div>

                            <div class="col-md-6 col-6">
                                <h4>{{$customer->email}}</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-6">
                                <strong>Customer Phone :</strong>
                            </div>

                            <div class="col-md-6 col-6">
                                <h4>{{$customer->phone}}</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-6">
                                <strong>Customer Address :</strong>
                            </div>

                            <div class="col-md-6 col-6">
                                <h4>{{$customer->address}}</h4>
                            </div>
                        </div>

                    @endif
                    @endforeach
                </div>
            </div>


            <div class="card mt-4">
                <div class="card-header font-weight-bold">Driver Information</div>
                <div class="card-body">
                    @foreach($drivers as $driver)
                    @if($driver->id == $reservatoin_preview_detail->driver_id)
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <strong>Driver Name :</strong><br>
                        </div>

                        <div class="col-md-6 col-6">
                            <h4>{{$driver->name}}</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <strong>Driver Email :</strong><br>
                        </div>

                        <div class="col-md-6 col-6">
                            <h4>{{$driver->email}}</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <strong>Driver Phone :</strong><br>
                        </div>

                        <div class="col-md-6 col-6">
                            <h4>{{$driver->phone}}</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-6">
                            <strong>Driver Message :</strong><br>
                        </div>

                        <div class="col-md-6 col-6">
                            <h4>{{$driver->message}}</h4>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>




            </div>
        </div>
        {{-- Rates And Texes Section --}}

        <div class="row ">
            <div class="col-md-6 col-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <strong>Package/Rates</strong>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="form-group">

                            @foreach($package_rates as $package_rate)
                            @if($package_rate->id == $reservatoin_preview_detail->package_rate_id)

                            <div class="row">
                                <div class="col-md-6 col-6">
                                    <strong>Package Name :</strong><br>
                                </div>

                                <div class="col-md-6 col-6">
                                    <h4>{{$package_rate->package_name}}</h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-6">
                                    <strong>Package Price:</strong><br>
                                </div>

                                <div class="col-md-6 col-6">
                                    <h4>{{$package_rate->package_price}}/hr Rs.</h4>
                                </div>
                            </div>
                            @endif
                            @endforeach
                          </div>
                    </div>


                </div>

                </div>

            </div>

            {{-- Vehicle Information --}}

            <div class="card mt-4">
                <div class="card-header">
                    <strong>Vehicle Information</strong>
                </div>
                <div class="card-body">
                    @foreach($vehicles as $vehicle)
                    @if($vehicle->id == $reservatoin_preview_detail->vehicle_id)
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <strong>Vehicle Name:</strong><br>
                        </div>

                        <div class="col-md-6 col-6">
                            <h4>{{$vehicle->name}}</h4>
                        </div>
                    </div>

                    @endif
                    @endforeach

                </div>

            </div>

            {{-- Taxes and Charges --}}

            <div class="card mt-4">
                <div class="card-header">
                    <strong>Texes</strong>
                </div>
                <div class="card-body">

                <div class="row">
                    <div class="col-md-12 col-12">
                        <strong for="inputEmail4">Total Taxes Amount :</strong>
                        <h3>{{$reservatoin_preview_detail->total_taxes_amount}}</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-12">
                        <strong for="inputEmail4">Taxes Notes Description :</strong>
                        <h3>{{$reservatoin_preview_detail->taxes_notes}}</h3>
                    </div>
                </div>

                </div>

            </div>

            {{-- miscelinoun charges --}}
            <div class="card mt-4">
                <div class="card-header">
                    <strong>Miscellaneous Charges :</strong>
                </div>
                <div class="card-body">

                <div class="row">
                    <div class="col-md-12 col-12">
                        <strong for="inputEmail4">Total Miscellaneous Charges :</strong>
                        <h3>{{$reservatoin_preview_detail->total_miscellaneous_charges}}</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-12">
                        <strong for="inputEmail4">Miscellaneous Charges Notes :</strong>
                        <h3>{{$reservatoin_preview_detail->miscellaneous_charges_notes}}</h3>
                    </div>
                </div>

                </div>

            </div>

            </div>

            {{-- Calculator --}}
            <div class="col-md-6 col-12 mt-4">

                <div class="card">
                    <div class="card-header">
                        <strong>Rates Calculation :</strong>
                    </div>
                    <div class="card-body">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                              <strong for="inputEmail4">Total Hours :</strong>
                              <h3>{{$reservatoin_preview_detail->total_hours}}</h3>
                            </div>
                            <div class="form-group col-md-6">
                              <strong for="inputPassword4">Hourly Amount :</strong>
                              <h3>{{$reservatoin_preview_detail->hourly_rate_amount}} /hr Rs.</h3>
                            </div>
                          </div>


                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <strong for="inputEmail4">Total Amount Of Package :</strong>
                              <h3>{{$reservatoin_preview_detail->total_rate_amount}} Rs.</h3>
                            </div>
                          </div>



                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <strong for="inputEmail4">Additional Charges :</strong>
                              <h3>{{$reservatoin_preview_detail->additional_charges}}</h3>
                            </div>
                            <div class="form-group col-md-6">
                              <strong for="inputPassword4">Fuel Chares :</strong>
                              <h3>{{$reservatoin_preview_detail->fuel_charges}}</h3>
                            </div>
                          </div>


                            <div class="form-group col-md-12">
                              <strong for="inputPassword4">Payment Method :</strong>
                              <h3>{{$reservatoin_preview_detail->payment_method}}</h3>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <strong>Total Amount :</strong>
                                </div>
                                <div class="card-body">
                                   <div class="row">
                                       <div class="col-6">
                                        <h2>Total Amount : </h2>
                                       </div>
                                       <div class="col-6">
                                        <h3>{{$reservatoin_preview_detail->total_amount}} Rs.</h3>
                                       </div>
                                   </div>

                                </div>
                            </div>
                    </div>
                </div>
            </div>


        </div>

        </div>
    </div>
        <button class="printbtn pull-right mr-4 mb-4 btn btn-success"><i class="fa fa-print mr-3"></i>Print Page</button>


</div>


@endsection

@section('scripts')
    <script>
        $(function(){
            $('.printbtn').click(function(){
                $("#printPage").print();
            });
        });
    </script>


@endsection
