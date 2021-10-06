@extends('layouts.app1')
@section('content')
<!-- Begin Franchise Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Add Goods & Transport Reservation</h1>
        <a  href="{{ route('goodstransport.index') }}"  class="  btn btn-sm bg-dark shadow-sm text-white"><i
            class="fas fa-plus fa-sm text-success "></i> Show All Goods & Transport Reservations </a>
    </div>


    <form action="{{ route('goodstransport.store') }}" method="POST" enctype="multipart/form-data" >
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
            <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <strong>Fretal Information</strong>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <strong> Select Reservation type =></strong>
                          </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                              <select class="form-control" name="reservation_type">
                                  <option value="online">Online</option>
                                  <option value="walkin">Walkin</option>
                                  <option value="phone">Phone</option>
                              </select>
                              <span class="text-danger font-weight-bold">{{$errors->first('reservation_type')}}</span>
                          </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group mt-3">
                            <strong>Ride type ?</strong>
                          </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Ride type Selected</label>
                              <input type="text" class="form-control" disabled  value="Goods & Transport">
                              <input type="hidden" name="reservation_for" class="form-control"  value="goods_and_transport">
                              <span class="text-danger font-weight-bold">{{$errors->first('reservation_for')}}</span>
                          </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <a href="{{ route('franchise.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Franchise</a>
                        </div>
                        <div class="form-group">
                            <label>Select Franchise</label>
                              <select class="form-control" name="branch">
                                  <option value="multan">Select Franchise</option>
                                  @foreach($franchises as $franchise)
                                    <option value="{{$franchise->id}}">{{$franchise->name}}</option>
                                  @endforeach

                              </select>
                              <span class="text-danger font-weight-bold">{{$errors->first('branch')}}</span>
                          </div>
                    </div>
                </div>

                </div>

            </div>
            </div>

            <div class="col-md-6 col-12">


            <div class="card">
                <div id="accordion">
                <div class="card-header">
                        <a class="btn btn-link" data-toggle="collapse" data-target="#collapseCustomerInformation" aria-expanded="false" aria-controls="collapseCustomerInformation">
                            Customer Information
                          </a>
                          <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseDriverInformation" aria-expanded="false" aria-controls="collapseDriverInformation">
                            Driver Information
                          </a>

                </div>
                <div class="card-body">

                    <div id="collapseCustomerInformation" class="collapse show" aria-labelledby="headingCustomerInformation" data-parent="#accordion">
                        <div class="card-body">
                            <div class="form-group">
                                <a href="{{ route('customer.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Customer</a>
                            </div>
                         <div class="form-group">
                            <label>Select Customer</label>
                            <select class="form-control" name='customer_id'>
                                <option value="">Select Customer</option>
                                @foreach($customers as $customer)
                                <option value="{{$customer->id}}">{{$customer->name}}({{$customer->phone}})</option>
                                @endforeach
                            </select>
                            <span class="text-danger font-weight-bold">{{$errors->first('customer_id')}}</span>
                         </div>
                        </div>
                      </div>

                      <div id="collapseDriverInformation" class="collapse" aria-labelledby="headingDriverInformation" data-parent="#accordion">

                        <div class="card-body">
                            <div class="form-group">
                                <a href="{{ route('driver.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Driver</a>
                            </div>
                         <div class="form-group">
                            <label>Select Driver</label>
                            <select class="form-control" name="driver_id">
                                <option value="">Select Driver</option>
                                @foreach($drivers as $driver)
                                <option value="{{$driver->id}}">{{$driver->name}}({{$driver->phone}})</option>
                                @endforeach
                            </select>
                            <span class="text-danger font-weight-bold">{{$errors->first('driver_id')}}</span>
                         </div>
                        </div>
                      </div>


                </div>

            </div>
        </div>

            </div>
        </div>
        {{-- Vehicle Category Type --}}
        <div class="row ">
        <div class="col-md-6 col-12 mt-4">
            <div class="card">
                <div class="card-header">
                    <strong>Vehicle Category</strong>
                </div>
                <div class="card-body">

                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Select Vehicle Type</label>
                            <select class="form-control" name="vehicle_type" >
                                <option value="flatbed">FLATBED</option>
                                <option value="container">CONTAINER</option>
                                <option value="halfbody">HALFBODY</option>
                                <option value="mazda">MAZDA</option>
                                <option value="shehzore">SHEHZORE</option>
                                <option value="pickup">PICKUP</option>
                            </select>
                              <span class="text-danger font-weight-bold">{{$errors->first('vehicle_type')}}</span>
                          </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Select Goods Type</label>
                            <select class="form-control" name="goods_type" >
                                <option value="fmcg">FMCG</option>
                                <option value="agriculture">AGRICULTURE</option>
                                <option value="steel">STEEL</option>
                                <option value="construction">CONSTRUCTION</option>
                                <option value="coal">COAL</option>
                                <option value="furniture">FURNITURE</option>
                                <option value="oil">OIL</option>
                                <option value="paper">PAPER</option>
                            </select>
                              <span class="text-danger font-weight-bold">{{$errors->first('goods_type')}}</span>
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
                <div class="form-group">
                 <a  href="{{ route('vehicle.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus pr-3 "></i>Add Vehicle</a>
                </div>
                <div class="row">

                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label> Select Vehicle</label>
                              <select class="form-control" name="vehicle_id">
                                  <option value="">Select Vehicle</option>
                                  @foreach($vehicles as $vehicle)
                                  <option value="{{$vehicle->id}}">{{$vehicle->name}}</option>
                                  @endforeach
                              </select>
                              <span class="text-danger font-weight-bold">{{$errors->first('vehicle_id')}}</span>
                          </div>
                    </div>
                </div>

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
                        <label for="inputEmail4">Total Taxes Amount</label>
                        <input type="number" class="form-control" name="total_taxes_amount" id="total_taxes_amount" placeholder="0.00">
                        <span class="text-danger font-weight-bold">{{$errors->first('total_taxes_amount')}}</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-12">
                        <label for="inputEmail4">Taxes Notes</label>
                        <textarea class="form-control" cols="3" rows="3" placeholder="Enter taxes description with amount one by one" name="taxes_notes"></textarea>
                        <span class="text-danger font-weight-bold">{{$errors->first('taxes_notes')}}</span>
                    </div>
                </div>

                </div>

            </div>

            {{-- miscelinoun charges --}}
            <div class="card mt-4">
                <div class="card-header">
                    <strong>Miscellaneous Charges</strong>
                </div>
                <div class="card-body">

                <div class="row">
                    <div class="col-md-12 col-12">
                        <label for="inputEmail4">Total Miscellaneous Charges</label>
                        <input type="number" class="form-control" name="total_miscellaneous_charges" id="total_miscellaneous_charges" placeholder="0.00">
                        <span class="text-danger font-weight-bold">{{$errors->first('total_miscellaneous_charges')}}</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-12">
                        <label for="inputEmail4">Miscellaneous Charges Notes</label>
                        <textarea class="form-control" cols="3" rows="3" placeholder="Enter Miscellaneous Charges description with amount one by one" name="miscellaneous_charges_notes"></textarea>
                        <span class="text-danger font-weight-bold">{{$errors->first('miscellaneous_charges_notes')}}</span>
                    </div>
                </div>

                </div>

            </div>

            </div>

            {{-- Calculator --}}
            <div class="col-md-6 col-12 ">

                   {{-- Additional  Information --}}

                   <div class="card mt-4">
                    <div class="card-header">
                        <strong>Additiona Information</strong>
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label>Pick-Up Location</label>
                                <div id="divSearch"></div>
                                <div id="map"></div>
                                <input type="hidden" id="locationTpl" class="form-control" name="pick_up_location" value="{{old('pick_up_location')}}" />
                                  <span class="text-danger font-weight-bold">{{$errors->first('pick_up_location')}}</span>
                              </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label>Drop-Off Location</label>
                                <div id="divSearchtwo"></div>
                                <div id="map"></div>
                                <input type="hidden" id="locationTpltwo" class="form-control" name="drop_off_location" value="{{old('drop_off_location')}}" />
                                  <span class="text-danger font-weight-bold">{{$errors->first('drop_off_location')}}</span>
                              </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label>Weight Of Transport/Kg</label>
                                <input type="number" class="form-control" name="weight_of_transport" id="weight_of_transport" value="{{old('weight_of_transport')}}" Placeholder="Enter weight_of_transport" />
                                  <span class="text-danger font-weight-bold">{{$errors->first('weight_of_transport')}}</span>
                              </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label>Rate Per Hour</label>
                                <input type="number" class="form-control" name="rate_per_hour" id="rate_per_hour" value="{{old('rate_per_hour')}}" placeholder="Enter rate_per_hour" />
                                  <span class="text-danger font-weight-bold">{{$errors->first('rate_per_hour')}}</span>
                              </div>
                        </div>
                    </div>
                    </div>

                </div>

                <div class="card mt-4 ">
                    <div class="card-header">
                        <strong>Rates Calculation</strong>
                    </div>
                    <div class="card-body">


                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <label for="inputEmail4">Total Amount/Rent/Rate</label>
                              <input type="number" class="form-control total_rate_amount" disabled   placeholder="0.00">
                              <input type="hidden" class="form-control total_rate_amount"   name="total_rate_amount" value="{{old('total_rate_amount')}}"  placeholder="0.00">
                              <span class="text-danger font-weight-bold">{{$errors->first('total_rate_amount')}}</span>
                            </div>
                          </div>

                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputEmail4">Total Tax Charges</label>
                              <input type="number" class="form-control"  disabled id="total_tax_charges" placeholder="0.00">
                              <input type="hidden" class="form-control" name="total_tax_charges"  id="total_tax_charges_hidden" placeholder="0.00">
                              <span class="text-danger font-weight-bold">{{$errors->first('total_tax_charges')}}</span>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4">Total Miscellaneous Charges (No Tax) :</label>
                              <input type="number" class="form-control"  disabled id="total_miscellaneous_charges_no_tax" placeholder="0.00">
                              <input type="hidden" class="form-control" name="total_miscellaneous_charges_no_tax"  id="total_miscellaneous_charges_no_tax_hidden" placeholder="0.00">
                              <span class="text-danger font-weight-bold">{{$errors->first('total_miscellaneous_charges_no_tax')}}</span>
                            </div>
                          </div>


                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputEmail4">Additional Charges</label>
                              <input type="number" class="form-control" name="additional_charges" id="total_additional_charges" placeholder="0.00">
                              <span class="text-danger font-weight-bold">{{$errors->first('additional_charges')}}</span>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4">Fuel Chares:</label>
                              <input type="number" class="form-control" name="fuel_charges" id="total_fuel_charges" placeholder="0.00">
                              <span class="text-danger font-weight-bold">{{$errors->first('fuel_charges')}}</span>
                            </div>
                          </div>

                          <div class="form-row">
                            <div class="form-group col-md-12">
                              <label for="inputPassword4">Payment Method</label>
                              <select class="form-control" name="payment_method">
                                  <option value="credit-card">Credit Card</option>
                                  <option value="debit-card">Debit Card</option>
                                  <option value="mobicash">Mobicash</option>
                                  <option value="easypaisa">Easypaisa</option>
                                  <option value="cash">By Cash</option>
                              </select>
                              <span class="text-danger font-weight-bold">{{$errors->first('payment_method')}}</span>
                            </div>
                        </div>

                            <div class="card">
                                <div class="card-header">
                                    <strong>Total Amount</strong>
                                </div>
                                <div class="card-body">
                                   <div class="row">
                                       <div class="col-6">
                                        <h2>Total Amount : </h2>
                                       </div>
                                       <div class="col-6">
                                       <div class="float-right d-flex d-inline"><h2 id="total_amount">0.00</h2> <strong>Rs.</strong></div>
                                       <input type="hidden" class="form-control" id="total_amount_hidden" name="total_amount"/>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                    <button type="button" class="btn btn-success btn-sm pull-right" onclick="calculate()">Calculate</button>
                                   </div>
                                </div>
                            </div>


                    </div>
                </div>
            </div>


        </div>

        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn bg-success btn-sm rounded-0 text-white">Goods&Tranport Reservation Preview</button>
        </div>
    </form>

</div>


@endsection

@section('scripts')

    <script>

        $(function(){

            // Hourly Price and Rate Accounting System
            $("#weight_of_transport").keyup(function(){
                var weight_of_transport = $(this).val();
                $('#weight_of_transport').val(weight_of_transport);
            });
            $("#rate_per_hour").keyup(function(){
                var rate_per_hour = $(this).val();
                var weight_of_transport = $("#weight_of_transport").val();
                var total_rate_amount = weight_of_transport * rate_per_hour;
                $(".total_rate_amount").val(total_rate_amount);

            });

            // Taxes and charges accounting system
            $("#total_taxes_amount").keyup(function(){
                var total_taxes_amount = $(this).val();
                $('#total_tax_charges').val(total_taxes_amount);
                $('#total_tax_charges_hidden').val(total_taxes_amount);

            });
            // total_miscellaneous_charges accounting system
            $("#total_miscellaneous_charges").keyup(function(){
                var total_miscellaneous_charges = $(this).val();
                $('#total_miscellaneous_charges_no_tax').val(total_miscellaneous_charges);
                $('#total_miscellaneous_charges_no_tax_hidden').val(total_miscellaneous_charges);
            });

        });

        function calculate()
        {
            var total_rate_amount =isNaN(parseInt($('.total_rate_amount').val())) ? 0 : parseInt($('.total_rate_amount').val()) ;
            var total_tax_charges       = isNaN(parseInt($('#total_tax_charges').val())) ? 0 : parseInt($('#total_tax_charges').val()) ;
            var total_miscellaneous_charges =  isNaN(parseInt($('#total_miscellaneous_charges').val())) ? 0 : parseInt($('#total_miscellaneous_charges').val()) ;
            var total_additional_charges =  isNaN(parseInt($('#total_additional_charges').val())) ? 0 : parseInt($('#total_additional_charges').val()) ;
            var total_fuel_charges =  isNaN(parseInt($('#total_fuel_charges').val())) ? 0 : parseInt($('#total_fuel_charges').val()) ;
            var total_amount_calculate = (total_rate_amount + total_tax_charges + total_miscellaneous_charges + total_additional_charges + total_fuel_charges );
           $('#total_amount').text(total_amount_calculate);
           $('#total_amount_hidden').val(total_amount_calculate);

        }
    </script>

@endsection

