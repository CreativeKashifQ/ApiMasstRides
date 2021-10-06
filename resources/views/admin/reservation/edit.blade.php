@extends('layouts.app1')
@section('content')
<!-- Begin Franchise Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Edit Reservation</h1>
        <a  href="{{ route('reservation.index') }}"  class="  btn btn-sm bg-dark shadow-sm text-white"><i
            class="fas fa-plus fa-sm text-success "></i> Show All Reservations </a>
    </div>


    <form action="{{ route('reservation.update',$editreservation->id) }}" method="POST" enctype="multipart/form-data" >
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
                    <strong>Rental Information</strong>
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
                                  <option value="online" @if($editreservation->reservation_type == 'online') {{'selected'}} @endif>Online</option>
                                  <option value="walkin" @if($editreservation->reservation_type == 'walkin') {{'selected'}} @endif>Walkin</option>
                                  <option value="phone" @if($editreservation->reservation_type == 'phone') {{'selected'}} @endif>Phone</option>
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
                              <input type="text" class="form-control" disabled  value="Rent A Car">
                              <input type="hidden" name="reservation_for" class="form-control"  value="{{$editreservation->reservation_for}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('reservation_for')}}</span>
                          </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label>Select Branch</label>
                              <select class="form-control" name="branch">
                                <option >Select Franchise</option>
                                @foreach($franchises as $franchise)
                                  <option value="{{$franchise->id}}" @if($editreservation->branch == $franchise->id ) {{'selected'}} @endif>{{$franchise->name}}</option>
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
                                <option value="{{$customer->id}}" @if($editreservation->customer_id == $customer->id ) {{'selected'}} @endif>{{$customer->name}}</option>
                                @endforeach
                            </select>
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
                                <option value="{{$driver->id}}" @if($editreservation->driver_id == $driver->id ) {{'selected'}} @endif>{{$driver->name}}</option>
                                @endforeach
                            </select>
                         </div>
                         <div>
                            <strong>Note:</strong> If You want to drive self, there is no need add driver information,click on chckbox !<br>
                        <div class="form-check-inline pt-2 pl-2">
                           <label class="form-check-label">
                             <input type="checkbox" class="form-check-input" style="width:15px; height:15px;" name="self" {{$editreservation->self == 'yes' ? 'checked' : ''}} value="yes"> <strong>Self ?</strong>
                           </label>
                         </div>
                       </div>
                        </div>
                      </div>


                </div>

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
                    <div class="form-group">
                        <a href="{{ route('package_rate.create') }}" class="btn btn-dark btn-sm"><i class="fa fa-plus"></i> Add Packahe/Rate</a>
                    </div>
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label>Select Package With Price/Rates</label>
                            <select class="form-control" name="package_rate_id" id="package_rate_id">
                                <option>Select Package Rate</option>
                                @foreach($package_rates as $package_rate)
                                <option value="{{$package_rate->id}}" @if($editreservation->package_rate_id == $package_rate->id ) {{'selected'}} @endif >{{$package_rate->package_name}} (_{{$package_rate->package_price}}_)Rs.</option>
                                @endforeach
                            </select>
                              <span class="text-danger font-weight-bold">{{$errors->first('package_name_price')}}</span>
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
                                  <option>Select Vehicle</option>
                                  @foreach($vehicles as $vehicle)
                                  <option value="{{$vehicle->id}}" @if($editreservation->vehicle_id == $vehicle->id ) {{'selected'}} @endif>{{$vehicle->name}}</option>
                                  @endforeach
                              </select>
                              <span class="text-danger font-weight-bold">{{$errors->first('vehicle')}}</span>
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
                        <input type="number" class="form-control" name="total_taxes_amount" id="total_taxes_amount" value="{{old('toltal_taxes_amount',$editreservation->total_taxes_amount)}}" placeholder="0.00">
                        <span class="text-danger font-weight-bold">{{$errors->first('total_taxes_amount')}}</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-12">
                        <label for="inputEmail4">Taxes Notes</label>
                        <textarea class="form-control" cols="3" rows="3" placeholder="Enter taxes description with amount one by one" name="taxes_notes">{{old('taxes_notes',$editreservation->taxes_notes)}}</textarea>
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
                        <input type="number" class="form-control" name="total_miscellaneous_charges" id="total_miscellaneous_charges" value="{{old('toltal_miscellaneous_charges)',$editreservation->total_miscellaneous_charges)}}" placeholder="0.00">
                        <span class="text-danger font-weight-bold">{{$errors->first('total_miscellaneous_charges')}}</span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-12">
                        <label for="inputEmail4">Miscellaneous Charges Notes</label>
                        <textarea class="form-control" cols="3" rows="3" placeholder="Enter Miscellaneous Charges description with amount one by one" name="miscellaneous_charges_notes">{{old('miscellaneous_charges_notes',$editreservation->miscellaneous_charges_notes)}}</textarea>
                        <span class="text-danger font-weight-bold">{{$errors->first('miscellaneous_charges_notes')}}</span>
                    </div>
                </div>

                </div>

            </div>

            </div>

            {{-- Calculator --}}
            <div class="col-md-6 col-12 mt-4">

                <div class="card">
                    <div class="card-header">
                        <strong>Rates Calculation</strong>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                              <label for="inputEmail4">Total Amount/Rate</label>
                              <input type="number" class="form-control total_rate_amount" value="{{old('total_rate_amount',$editreservation->total_rate_amount)}}" disabled   placeholder="0.00">
                              <input type="hidden" class="form-control total_rate_amount"   name="total_rate_amount" value="{{old('total_rate_amount',$editreservation->total_rate_amount)}}"  placeholder="0.00">
                              <span class="text-danger font-weight-bold">{{$errors->first('total_rate_amount')}}</span>
                            </div>
                          </div>

                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputEmail4">Total Tax Charges</label>
                              <input type="number" class="form-control"  disabled id="total_tax_charges" value="{{old('total_taxes_amount',$editreservation->total_taxes_amount)}}" placeholder="0.00">
                              <input type="hidden" class="form-control" name="total_tax_charges"  id="total_tax_charges_hidden" value="{{old('total_taxes_amount',$editreservation->total_taxes_amount)}}" placeholder="0.00">
                              <span class="text-danger font-weight-bold">{{$errors->first('total_tax_charges')}}</span>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4">Total Miscellaneous Charges (No Tax) :</label>
                              <input type="number" class="form-control"  disabled id="total_miscellaneous_charges_no_tax" value="{{old('total_miscellaneous_charges',$editreservation->total_miscellaneous_charges)}}" placeholder="0.00">
                              <input type="hidden" class="form-control" name="total_miscellaneous_charges_no_tax"  id="total_miscellaneous_charges_no_tax_hidden" value="{{old('total_miscellaneous_charges',$editreservation->total_miscellaneous_charges)}}" placeholder="0.00">
                              <span class="text-danger font-weight-bold">{{$errors->first('total_miscellaneous_charges_no_tax')}}</span>
                            </div>
                          </div>


                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputEmail4">Additional Charges</label>
                              <input type="number" class="form-control" name="additional_charges" id="total_additional_charges" value="{{old('additional_charges',$editreservation->additional_charges)}}" placeholder="0.00">
                              <span class="text-danger font-weight-bold">{{$errors->first('additional_charges')}}</span>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4">Fuel Chares:</label>
                              <input type="number" class="form-control" name="fuel_charges" id="total_fuel_charges" value="{{old('fuel_charges',$editreservation->fuel_charges)}}" placeholder="0.00">
                              <span class="text-danger font-weight-bold">{{$errors->first('fuel_charges')}}</span>
                            </div>
                          </div>


                            <div class="form-group col-md-12">
                              <label for="inputPassword4">Payment Method</label>
                              <select class="form-control" name="payment_method">
                                  <option value="credit-card" @if($editreservation->payment_method == 'credit-card') {{'selected'}} @endif>Credit Card</option>
                                  <option value="debit-card" @if($editreservation->payment_method == 'debit-card') {{'selected'}} @endif>Debit Card</option>
                                  <option value="mobicash" @if($editreservation->payment_method == 'mobicash') {{'selected'}} @endif>Mobicash</option>
                                  <option value="easypaisa" @if($editreservation->payment_method == 'easypaisa') {{'selected'}} @endif>Easypaisa</option>
                                  <option value="cash" @if($editreservation->payment_method == 'ccash') {{'selected'}} @endif>By Cash</option>
                              </select>
                              <span class="text-danger font-weight-bold">{{$errors->first('payment_method')}}</span>
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
                                       <div class="float-right d-flex d-inline"><h2 id="total_amount">@if(isset($editreservation)) {{$editreservation->total_amount}} @else 0.00 @endif</h2> <strong>Rs.</strong></div>
                                       <input type="hidden" class="form-control" id="total_amount_hidden" value="{{old('total_amount',$editreservation->total_amount)}}" name="total_amount"/>
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
            <button type="submit"  class="btn bg-success btn-sm rounded-0 text-white">Reservation Preview</button>
        </div>
    </form>

</div>


@endsection

@section('scripts')

    <script>

        $(function(){

             //Pckage rate added in calculator on change
             $('#package_rate_id ').on('change',function(){
                var package_rate_price = "'"+$("#package_rate_id :selected").text()+"'";
                var package_rate_price_val = package_rate_price.split('_');
                var package_rate_price_arr = package_rate_price_val[1];
                $(".total_rate_amount").val(package_rate_price_arr);
            });

            // Hourly Price and Rate Accounting System
            $("#totalhours").keyup(function(){
                var total_hours = $(this).val();

            });
            $("#perhourrate").keyup(function(){
                var per_hour_rate = $(this).val();
                var total_hours = $("#totalhours").val();
                var total_hourly_rate_amount = total_hours * per_hour_rate;
                $("#total_hourly_rate_amount").val(total_hourly_rate_amount);
                $("#total_hourly_rate_amount_hidden").val(total_hourly_rate_amount);


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
            var total_hourly_rate_amount =isNaN(parseInt($('#total_hourly_rate_amount').val())) ? 0 : parseInt($('#total_hourly_rate_amount').val()) ;
            var total_tax_charges       = isNaN(parseInt($('#total_tax_charges').val())) ? 0 : parseInt($('#total_tax_charges').val()) ;
            var total_miscellaneous_charges =  isNaN(parseInt($('#total_miscellaneous_charges').val())) ? 0 : parseInt($('#total_miscellaneous_charges').val()) ;
            var total_additional_charges =  isNaN(parseInt($('#total_additional_charges').val())) ? 0 : parseInt($('#total_additional_charges').val()) ;
            var total_fuel_charges =  isNaN(parseInt($('#total_fuel_charges').val())) ? 0 : parseInt($('#total_fuel_charges').val()) ;
            var total_amount_calculate = (total_hourly_rate_amount + total_tax_charges + total_miscellaneous_charges + total_additional_charges + total_fuel_charges );
           $('#total_amount').text(total_amount_calculate);
           $('#total_amount_hidden').val(total_amount_calculate);

        }
    </script>

@endsection

