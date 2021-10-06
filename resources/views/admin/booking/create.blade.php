@extends('layouts.app1')
@section('content')
<!-- Begin Franchise Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Manage Booking At Workshop</h1>
        <a  href="{{ route('booking.show') }}"  class="  btn btn-sm bg-dark shadow-sm text-white"><i
            class="fas fa-plus fa-sm text-success "></i> Show Bookings </a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>
                        <a  href="{{ route('workshopvehicle.create') }}"  class="  btn btn-sm bg-dark shadow-sm text-white"><i
                        class="fas fa-plus fa-sm text-success "></i> Manage Vehicle </a>
                        <a  href="{{ route('customer.create') }}"  class="  btn btn-sm bg-warning shadow-sm text-dark"><i
                            class="fas fa-plus fa-sm text-success "></i> Manage Customers </a>
                        <a  href="{{ route('service.create') }}"  class="  btn btn-sm bg-primary shadow-sm text-white"><i
                                class="fas fa-plus fa-sm text-success "></i> Manage Services </a>
                        <a  href="{{ route('product.create') }}"  class="  btn btn-sm bg-info shadow-sm text-white"><i
                                    class="fas fa-plus fa-sm text-dark "></i> Manage Products </a>
                        <a  href="{{ route('mechanic.create') }}"  class="  btn btn-sm bg-secondary shadow-sm text-white"><i
                                        class="fas fa-plus fa-sm text-success "></i> Manage Mechanics </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data" >
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
            <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <strong>Add Booking</strong>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Customer Name</label>
                             <select class="form-control" name="customerId">
                                 <option>Select customer</option>
                                  @foreach($customers as $customer)
                                 <option value="{{$customer->id}}" @if(old('customerId') == $customer->id) {{'selected'}} @endif>{{$customer->name}}</option>
                                 @endforeach

                             </select>
                          </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Select Vehicle</label>
                             <select class="form-control" name="workshopvehicleId">
                                 <option>Select Vehicle</option>
                                 @if(isset($workshopvehicles) && $workshopvehicles->count() > 0)
                                  @foreach($workshopvehicles as $workshopvehicle)
                                 <option value="{{$workshopvehicle->id}}" @if(old('workshopvehicleId') == $workshopvehicle->id) {{'selected'}} @endif>{{$workshopvehicle->vname}}</option>
                                 @endforeach
                                 @endif
                             </select>
                          </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Select Services</label>
                              <select class="form-control js-add-services-multiple" name="servicesIds[]"  multiple="multiple">
                                  <option value="">Select Services</option>
                                  @foreach($services as $service)
                                  <option value="{{$service->id}}"  {{ (collect(old('servicesIds'))->contains($service->id)) ? 'selected':'' }} >{{$service->name}} ({{$service->price}} Rs.)</option>
                                  @endforeach
                              </select>
                              <span class="text-danger font-weight-bold">{{$errors->first('servicesIds')}}</span>
                          </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Select Products</label>
                              <select class="form-control js-add-services-multiple" name="productsIds[]"  multiple="multiple">
                                  <option value="">Select Services</option>
                                  @foreach($products as $product)
                                  <option value="{{$product->id}}" {{collect(old('productsIds'))->contains($product->id) ? 'selected' : ''}}>{{$product->name}} ({{$product->price}} Rs.)</option>
                                  @endforeach
                              </select>
                              <span class="text-danger font-weight-bold">{{$errors->first('productsIds')}}</span>
                          </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Select Mechanics</label>
                              <select class="form-control js-add-services-multiple" name="mechanicsIds[]"  multiple="multiple">
                                  <option value="">Select Mechanics</option>
                                  @foreach($mechanics as $mechanic)
                                  <option value="{{$mechanic->id}}" {{collect(old('mechanicsIds'))->contains($mechanic->id) ? 'selected' : ''}} >{{$mechanic->name}}</option>
                                  @endforeach
                              </select>
                              <span class="text-danger font-weight-bold">{{$errors->first('mechanicsIds')}}</span>
                          </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Phone</label>
                              <input type="number" name="phone" class="form-control" placeholder="Enter Phone" value="{{old('phone')}}" >
                              <span class="text-danger font-weight-bold">{{$errors->first('phone')}}</span>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label>Location</label>
                            <div id="divSearch"></div>
                            <div id="map"></div>
                              <input type="hidden"id="locationTpl" name="location" class="form-control" placeholder="Enter Location" value="{{old('location')}}" >
                              <span class="text-danger front-weight-bold">{{$errors->first('location')}}</span>
                        </div>
                    </div>
                </div>

                </div>

            </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn bg-success btn-sm rounded-0 text-white">Add Booking</button>
        </div>
    </form>

</div>
@endsection

@section('scripts')

 <!--SLIDER 2 CDN LINKS -->
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
 <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <script>
   $(document).ready(function() {
 $('.js-add-services-multiple').select2({ width: '100%',});
 });
 </script>

@endsection
