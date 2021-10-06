@extends('layouts.app1')
@section('title', 'add-new-vehicle')
@section('content')
    <!-- Begin Franchise Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-color-black">Edit Vehicle</h1>
            <div>
                <a href="{{ route('vehiclemanagement.show') }}"
                    class=" float-righ mr-2 d-sm-inline-block btn btn-sm bg-dark shadow-sm text-white"><i
                        class="fas fa-eye fa-sm text-success "></i> Manage Vehicles </a>
                <a href="{{ route('vehicle.show') }}"
                    class=" float-right d-sm-inline-block btn btn-sm bg-warning shadow-sm text-white"><i
                        class="fas fa-eye fa-sm text-success "></i> Show Vehicles </a>
            </div>
        </div>

        <form action="{{ route('vehicle.update', $editvehicle->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success ! </strong> {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error ! </strong> {{ Session::get('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header"><strong>Edit Details</strong></div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Stock Number</label>
                                    <input type="text" class="form-control" name="stocknumber" placeholder="eg.44 "
                                        value="{{ old('stocknumber', $editvehicle->stocknumber) }}">
                                    <span class="text-danger">{{ $errors->first('stocknumber') }}</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Reg. No</label>
                                    <input type="text" class="form-control" name="regno" placeholder="eg.F 55-67 "
                                        value="{{ old('regno', $editvehicle->regno) }}">
                                    <span class="text-danger">{{ $errors->first('regno') }}</span>
                                </div>
                            </div>


                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Make</label>
                                    <select class="form-control" name="make">
                                        <option>Select Make</option>
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}" @if($editvehicle->make == $company->id) {{'selected'}} @endif>{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('make') }}</span>
                                </div>
                            </div>

                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="eg. Mehran,cultus"
                                        value="{{ old('name' , $editvehicle->name) }}">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Model</label>
                                    <input type="text" class="form-control" placeholder="eg.echo" name="model"
                                        value="{{ old('model', $editvehicle->model) }}">
                                    <span class="text-danger">{{ $errors->first('model') }}</span>
                                </div>
                            </div>

                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Year</label>
                                    <input type="text" name="year" class="form-control" placeholder="eg. 2021"
                                        value="{{ old('year',$editvehicle->year) }}">
                                    <span class="text-danger">{{ $errors->first('year') }}</span>
                                </div>
                            </div>

                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Type</label>
                                    <select class="form-control" name="type">
                                        <option>Select Type</option>
                                        <option value="car" @if (old('type',$editvehicle->type) == 'car') {{ 'selected' }} @endif>Car</option>
                                        <option value="truck" @if (old('type',$editvehicle->type) == 'truck') {{ 'selected' }} @endif>Truck</option>
                                        <option value="bus" @if (old('type',$editvehicle->type) == 'bus') {{ 'selected' }} @endif>Bus</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('type') }}</span>
                                </div>
                            </div>

                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Color</label>
                                    <select class="form-control" name="color">
                                        <option>Select Color</option>
                                        <option value="red" @if (old('color',$editvehicle->color) == 'red') {{ 'selected' }} @endif>Red</option>
                                        <option value="black" @if (old('color',$editvehicle->color) == 'black') {{ 'selected' }} @endif>Black</option>
                                        <option value="white" @if (old('color',$editvehicle->color) == 'white') {{ 'selected' }} @endif>White</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('color') }}</span>
                                </div>
                            </div>


                        </div>


                        <div class="row">

                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Transmission</label>
                                    <select class="form-control" name="transmission">
                                        <option value="standard" @if ($editvehicle->transmission == 'standard') {{ 'selected' }} @endif>Standard</option>
                                        <option value="automation" @if ($editvehicle->transmission == 'automation') {{ 'selected' }} @endif>Automation</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('transmission') }}</span>
                                </div>
                            </div>


                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Engine</label>
                                    <select class="form-control" name="engine">
                                        <option>Select Engine(Power)</option>
                                        @foreach($engines as $engine)
                                        <option value="{{$engine->id}}" @if (old('engine',$editvehicle->engine) == $engine->id) {{ 'selected' }} @endif>{{$engine->power}} (cc)</option>
                                        @endforeach

                                    </select>
                                    <span class="text-danger">{{ $errors->first('engine') }}</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Fuel Charg</label>
                                    <input type="number" class="form-control" name="fuel_charg" placeholder="eg.Rs."
                                        value="{{ old('fuel_charg', $editvehicle->fuel_charg) }}">
                                    <span class="text-danger">{{ $errors->first('fuel_charg') }}</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Register Date</label>
                                    <input type="date" class="form-control" name="first_date" placeholder=" "
                                        value="{{ old('first_date', $editvehicle->first_date) }}">
                                    <span class="text-danger">{{ $errors->first('first_date') }}</span>
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Current Value(Price)</label>
                                    <input type="number" class="form-control" name="purchase_price" placeholder="Rs.  "
                                        value="{{ old('purchase_price',$editvehicle->purchase_price) }}">
                                    <span class="text-danger">{{ $errors->first('purchase_price') }}</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Tracker</label>
                                    <select class="form-control" name="tracker">
                                        <option value="yes" @if (old('tracker',$editvehicle->tracker) == 'yes') {{ 'selected' }} @endif>Yes</option>
                                        <option value="no" @if (old('tracker',$editvehicle->tracker) == 'no') {{ 'selected' }} @endif>No</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('tracker') }}</span>
                                </div>
                            </div>


                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Availability</label>
                                    <select class="form-control" name="availability">
                                        <option value="available" @if (old('availability',$editvehicle->availability) == 'available') {{ 'selected' }} @endif>Available</option>
                                        <option value="onrent" @if (old('availability',$editvehicle->availability) == 'onrent') {{ 'selected' }} @endif>OnRent</option>
                                        <option value="goodstransport" @if (old('availability',$editvehicle->availability) == 'goodstransport') {{ 'selected' }} @endif>Good&Transport</option>
                                        <option value="function" @if (old('availability',$editvehicle->availability) == 'function') {{ 'selected' }} @endif>Function</option>
                                        <option value="tourstravel" @if (old('availability',$editvehicle->availability) == 'tourstravel') {{ 'selected' }} @endif>Tours&Travel</option>
                                        <option value="hourlyrides" @if (old('availability',$editvehicle->availability) == 'hourlyrides') {{ 'selected' }} @endif>HourlyRides</option>
                                        <option value="outofcity" @if (old('availability',$editvehicle->availability) == 'outofcity') {{ 'selected' }} @endif>OutOfCity</option>
                                        <option value="pickdrop" @if (old('availability',$editvehicle->availability) == 'pickdrop') {{ 'selected' }} @endif>Pick&Drop</option>
                                        <option value="accident" @if (old('availability',$editvehicle->availability) == 'accident') {{ 'selected' }} @endif>Accident</option>
                                        <option value="maintenance" @if (old('availability',$editvehicle->availability) == 'maintenance') {{ 'selected' }} @endif>Maintenance</option>
                                        <option value="sold" @if (old('availability',$editvehicle->availability) == 'sold') {{ 'selected' }} @endif>Sold</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('availability') }}</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Franchise</label>
                                    <select class="form-control" name="branch">
                                        <option>Select Franchise</option>
                                        @foreach ($franchises as $franchise)
                                            <option value="{{ $franchise->id }}" @if (old('branch',$editvehicle->branch) == $franchise->id) {{ 'selected' }} @endif>{{ $franchise->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('branch') }}</span>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Location</label><small class="text-danger pr-2">{{$editvehicle->location}}</small>
                                    <div id="divSearch"></div>
                                    <div id="map"></div>
                                    <input type="hidden" id="locationTpl" class="form-control" name="location" placeholder="eg. # Multan"
                                        value="{{ old('location', $editvehicle->location) }}">
                                    <span class="text-danger">{{ $errors->first('location') }}</span>
                                </div>
                            </div>

                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Select class</label>
                                    <select class="form-control" name="vcategory">

                                        <option value="economy" @if ($editvehicle->vcategory == 'economy') {{ 'selected' }} @endif>Economy</option>
                                        <option value="business" @if ($editvehicle->vcategory == 'business') {{ 'selected' }} @endif>Business</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('vcategory') }}</span>
                                </div>
                            </div>

                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Country</label>
                                    <input type="text" class="form-control" name="country" placeholder="eg.Pakistan"
                                        name="model" value="{{ old('country', $editvehicle->country) }}">
                                    <span class="text-danger">{{ $errors->first('country') }}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <strong>Upload Image</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class=" d-flex justify-content-center pb-3">
                                    <img id="showImage" src="{{ asset('images/vehiclepic.png') }}"
                                        style="width: 200px; height: 200px;">
                                </div>
                                <div class="custom-file d-flex justify-content-center col-md-6 col-12 mx-auto ">
                                    <input type="file" class="custom-file-input-vehicle" id="customFile" name="image">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn bg-success btn-sm rounded-0 text-white">Update Vehicle</button>
            </div>
        </form>

    </div>
@endsection

@section('scripts')


    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input-vehicle").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
        //Image Upload View
        $('#customFile').on('change', function(e) {
            var x = URL.createObjectURL(e.target.files[0]);
            $('#showImage').attr('src', x);
        });

    </script>

@endsection
