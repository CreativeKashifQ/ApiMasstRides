@extends('layouts.app1')
@section('title','roles-listing')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="my-4">
        <a href="{{route('driver.show')}}" class="btn btn-sm bg-secondary text-white">Back</a>
    </div>
    <div class="">
        @include('partials/alerts');
		<div class="main-body">
			<div class="row">
				<div class="col-lg-4">
                    <form action="{{route('assign.franchise')}}" method="POST" enctype="multipart/form-data">
                        @csrf
					<div class="card">
                        <div class="card-header bg-green text-white">Driver Information</div>
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
								<div class="mt-3">
									<h4 class="text-green">{{$driver->name}}</h4>
									<p class="text-secondary mb-1">{{$driver->email}}</p>
									<p class="text-muted font-size-sm">{{$driver->phone}}</p>
                                    <p class="text-muted font-size-sm">{{$driver->city}},{{$driver->state}}, {{$driver->country}}</p>
                                    <input type="hidden" value="{{$driver->id}}" name="driver"/>
                                   <div class="form-group">
                                    <select class="form-control @error('franchise') is-invalid @enderror"  name="franchise">
                                        <option value="null" disabled selected>__Select Franchise__</option>
                                        @foreach ($franchises as $franchise)
                                           <option value="{{$franchise->id}}" >{{$franchise->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('franchise')
                                    <div class="invalid-feedback">{{ $errors->first('franchise') }}</div>
                                    @enderror


                                   </div>
									<button type="submit" class="btn btn-outline-succes bg-green text-white form-control">Assign Franchise</button>
								</div>
							</div>
						</div>
					</div>
                </form>
				</div>
				<div class="col-lg-8">
					<div class="card">
                        <div class="card-header bg-green text-white">Franchises Located in {{$driver->city}}</div>
						<div class="card-body">
                            <div class="d-flex justify-content-center mb-4">
                                <span class="badge {{$driver->franchise != null ? 'badge-success' : 'badge-danger'}}">{{$driver->franchise != null ? 'Driver Associated With This Franchise' : 'Driver Not Assigned'}}</span>
                            </div>
                            @foreach ($franchises as $franchise)
                            <div class="badge badge-success">
                                <div class="row ">
                                    <div class="col-sm-6">
                                        <h6 class="mb-0 font-weight-bold">{{$franchise->name}}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <strong class="text-green">MR Number</strong>
                                </div>
                                <div class="co-sm-6" >
                                    <span>MR-{{$franchise->city}}-00{{$franchise->id}}</span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <strong class="text-green">Name</strong>
                                </div>
                                <div class="co-sm-6" >
                                    <span>{{$franchise->name}}</span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <strong class="text-green">Email</strong>
                                </div>
                                <div class="co-sm-6" >
                                    @if($franchise->user == null)
                                    <span class="badge badge-danger">Franchise is not assign to any user</span>
                                    @else
                                    {{$franchise->user->email}}
                                    @endif
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <strong class="text-green">Phone</strong>
                                </div>
                                <div class="co-sm-6" >
                                    <span>{{$franchise->phone}}</span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <strong class="text-green">CNIC</strong>
                                </div>
                                <div class="co-sm-6" >
                                    <span>{{$franchise->cnic}}</span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <strong class="text-green">Shop Address</strong>
                                </div>
                                <div class="co-sm-6" >
                                    <span>{{$franchise->address}}</span>
                                </div>
                            </div>
                               <div class="row mt-2">
                                <div class="col-sm-6">
                                    <strong class="text-green">City</strong>
                                </div>
                                <div class="co-sm-6" >
                                    <span>{{$franchise->city}}</span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <strong class="text-green">Subscription Days</strong>
                                </div>
                                <div class="co-sm-6" >
                                    <span>{{$franchise->subscription_days}}</span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <strong class="text-green">Paid Amount</strong>
                                </div>
                                <div class="co-sm-6" >
                                    <span>{{$franchise->paid_amount}}</span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <strong class="text-green">Paid By</strong>
                                </div>
                                <div class="co-sm-6" >
                                    <span>{{$franchise->paid_by}}</span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <strong class="text-green">Transaction Id</strong>
                                </div>
                                <div class="co-sm-6" >
                                    <span>{{$franchise->transaction_id}}</span>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <strong class="text-green">Transaction Slip</strong>
                                </div>
                                <div class="co-sm-6" >
                                    <img id="showImage" src="{{asset('images/uploads/transactionslips/'.$franchise->transaction_slip)}}" alt="Franchise Transaction Slip" />
                                </div>
                            </div>

                            @endforeach




						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

</div>
@endsection


