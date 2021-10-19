@extends('layouts.app1')
@section('title','roles-listing')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="my-4">
        <a href="{{route('franchise.show')}}" class="btn btn-sm bg-secondary text-white">Back</a>
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
                        <div class="card-header bg-green text-white">More Actions For This Franchise {{$franchise->name}}</div>
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <a href="{{route('franchise.drivers',$franchise->id)}}" class="btn btn-success bg-green text-white">Drivers For This Franchise </a>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4">
                                    <div class="form-group">
                                        <a href="{{route('franchise.v-requests',$franchise->id)}}" class="btn btn-success bg-green text-white">Vehicle Requests For Franchise</a>
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
@endsection


