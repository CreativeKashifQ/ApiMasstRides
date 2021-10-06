@extends('layouts.app1')
@section('content')
<!-- Begin Franchise Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Manage Tour&Travels Vehicles</h1>
        <a  href="{{ route('tourtravel.show') }}"  class=" float-right d-sm-inline-block btn btn-sm bg-warning shadow-sm text-white"><i
        class="fas fa-eye fa-sm text-success "></i> Show Tour&Travel </a>
    </div>
    
    <form action="{{ route('tourtravel.store') }}" method="POST" enctype="multipart/form-data" >
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
                    <strong>Tour Planning</strong>
                </div>

                <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>First Name</label>
                              <input type="text" name="fname" class="form-control" placeholder="First Name" value="{{old('fname')}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('fname')}}</span>
                          </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Last Name</label>
                              <input type="text" name="lname" class="form-control" value="{{old('lname')}}" placeholder="Last Name">
                              <span class="text-danger font-weight-bold">{{$errors->first('lname')}}</span>
                          </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Email</label>
                              <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('email')}}</span>
                          </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Phone Number</label>
                              <input type="number" name="phone" class="form-control" placeholder="Phone Number" value="{{old('phone')}}" >
                              <span class="text-danger font-weight-bold">{{$errors->first('phone')}}</span>
                          </div>
                    </div>
                </div>

                  <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                                <label>Departure Date</label>
                              <input type="date" name="depdate" class="form-control" placeholder="Start Date" value="{{old('depdate')}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('depdate')}}</span>
                          </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Departure Time</label>
                              <input type="time" name="deptime" class="form-control" placeholder="Time" value="{{value('deptime')}}">
                               <span class="text-danger font-weight-bold">{{$errors->first('deptime')}}</span>
                          </div>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                                <label>Arrival Date</label>
                              <input type="date" name="arrivaldate" class="form-control" placeholder="Start Date" value="{{value('arrivaldate')}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('arrivaldate')}}</span>
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                         <div class="form-group">
                            <label> Arrival Time</label>
                              <input type="time" name="arrivaltime" class="form-control" placeholder="Time" value="{{old('arrivaltime')}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('arrivaltime')}}</span>
                          </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-12">
                         <div class="form-group">
                                <label>No. of Passengers</label>
                              <input type="number" name="passengers" class="form-control" placeholder="Passengers" value="{{old('passengers')}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('passengers')}}</span>
                          </div>
                    </div>
                    <div class="col-md-6 col-12">
                         <div class="form-group">
                            <label>Destination</label>
                              <input type="text" name="destination" class="form-control" placeholder="Destination Name" value="{{old('destination')}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('destination')}}</span>
                          </div>
                    </div>
                </div>

                </div>

            </div>
            </div>

        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <strong>Select Tour&Travel Vehicle</strong>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <select class="form-control" name="tt_id">
                            <option value="1">Tour Travel Car</option>
                            {{-- @if(isset($vehicles))
                            @foreach($vehicles as $vehicle)
                            <option value="{{$vehicle->id}}">{{$vehicle->name}}</option>
                            @endforeach
                            @endif --}}
                        </select>
                        <span class="text-danger font-weight-bold">{{$errors->first('tt_id')}}</span>
                    </div>
                </div>
            </div>
            </div>
        </div> 


        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn bg-success btn-sm rounded-0 text-white">Add Detail</button>
        </div>
    </form>
    
</div>
@endsection

@section('scripts')

 

@endsection