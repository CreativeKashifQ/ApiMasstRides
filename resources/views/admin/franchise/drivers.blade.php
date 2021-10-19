@extends('layouts.app1')
@section('title','roles-listing')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="my-4">
        <a href="{{route('franchise.more-actions',$franchise->id)}}" class="btn btn-sm bg-secondary text-white">Back</a>
    </div>
    <div class="">
        @include('partials/alerts');
		<div class="main-body">
			<div class="row">
				<div class="col-lg-4">
                    <form action="{{route('assign.franchise')}}" method="POST" enctype="multipart/form-data">
                        @csrf
					<div class="card">
                        <div class="card-header bg-green text-white">Franchise Information</div>
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
								<img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
								<div class="mt-3">
									<h4 class="text-green">{{$franchise->name}}</h4>
                                    <strong class="text-muted font-size-sm">MR-{{$franchise->city}}-00{{$franchise->id}}</strong>
									<p class="text-danger mb-1">{{$franchise->user != null ? $franchise->user->email : 'Franchise is not assign!'}}</p>
									<p class="text-muted font-size-sm mb-1">{{$franchise->phone}}</p>
                                    <p class="text-muted font-size-sm mb-1">{{$franchise->cnic}}</p>
                                    <p class="text-muted font-size-sm mb-1 ">{{$franchise->address}},{{$franchise->city}}</p>
								</div>
							</div>
						</div>
					</div>
                </form>
				</div>
				<div class="col-lg-8">
					<div class="card">
                        <div class="card-header bg-green text-white">Drivers Assign to Franchise {{$franchise->name}}</div>
                        <div class="card-body">
                            <table class="table   table-striped table-sm   " >
                                <thead>
                                    <tr style="font-size: 13px;" class="text-green">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Country</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="data">
                                    @if(isset($drivers) && $drivers->count() > 0)
                                    @foreach($drivers as $key=> $driver)
                                    <tr style="font-size: 13px;"  >
                                        <td>{{++$key}}</td>
                                        <td>{{$driver->name}}</td>
                                        <td>{{$driver->email}}</td>
                                        <td>{{$driver->phone}}</td>
                                        <td>{{$driver->country}}</td>
                                        <td>{{$driver->state}}</td>
                                        <td>{{$driver->city}}</td>
                                        <td>{{Carbon\Carbon::parse($driver->created_at)->format('d M, Y')}}</td>
                                        <td class="d-flex d-inline">
                                            <a href="#" class="btn btn-link btn-sm">Police Verification</a> |
                                            <a href="#" class="btn btn-link btn-sm">Gallery</a>
                                        </td>

                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="9" class="text-center"><strong>No, Drivers Found</strong></td>
                                    </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>

				</div>
			</div>
		</div>
	</div>

</div>
@endsection


