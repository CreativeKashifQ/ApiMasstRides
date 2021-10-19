<div>


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="mb-0 text-green font-weight-bold">Vehicle Request Gallery</h5>
        </div>
        <div class="my-4">
            <a href="{{ route('franchise.more-actions', $vRequest->id) }}"
                class="btn btn-sm bg-secondary text-white">Back</a>
        </div>
        <div class="">
            @include('partials/alerts')
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <form action="{{ route('assign.franchise') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-header font-weight-bold bg-green text-white">Vehicle Request Owner Information</div>
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin"
                                            class="rounded-circle p-1 bg-primary" width="110">
                                        <div class="mt-3">
                                            <h4 class="text-green font-weight-bold text-capitalize">{{ $vRequest->name }}</h4>
                                            <strong
                                                class="text-muted font-size-sm">MR-{{ $vRequest->city }}-00{{ $vRequest->id }}</strong>
                                            <p class="text-muted mb-1 text-capitalize">{{ $vRequest->email }}</p>
                                            <p class="text-muted font-size-sm mb-1">{{ $vRequest->phone }}</p>
                                            <p class="text-muted font-size-sm mb-1">{{ $vRequest->cnic }}</p>
                                            <p class="text-muted font-size-sm mb-1 ">
                                                {{ $vRequest->city }},{{ $vRequest->state }},{{ $vRequest->country }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                        <div class="my-4">
                            <form wire:submit.prevent="assignFranchise" enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-header font-weight-bold bg-green text-white font-weight-bold">Assign Franchise</div>
                                    <div class="card-body">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            <i class=" fa fa-building fa-5x"></i>

                                            <div class="mt-3">
                                                <h4 class="text-green text-capitalize font-weight-bold">{{$vRequest->name}}</h4>
                                                <p class="text-secondary mb-1 text-capitalize">{{$vRequest->email}}</p>
                                                <p class="text-muted font-size-sm">{{$vRequest->phone}}</p>
                                                <p class="text-muted font-size-sm">{{$vRequest->city}},{{$vRequest->state}}, {{$vRequest->country}}</p>
                                                <input type="hidden" value="{{$vRequest->id}}" name="driver"/>
                                               <div class="form-group">
                                                <select class="form-control @error('franchise') is-invalid @enderror" wire:model="franchise">
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
                    </div>


                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header font-weight-bold bg-green text-white">VEHICLE IMAGES</div>
                            <div class="card-body">
                                <div class="row">

                                    <div class=" col-12 col-md-12">
                                        <div id="demo" class="carousel slide" data-ride="carousel">


                                            <!-- The slideshow -->
                                            <div class="carousel-inner">
                                                <img style="width:803px; height446px;" src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/2019-hyundai-kona-1548195339.jpg?crop=1xw:0.9997727789138833xh;center,top&resize=480:*"/>
                                                @if (!$vImages->isEmpty())
                                                @foreach ($vImages as $key => $vImage)
                                                <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                                                    <img style="width: 803px; height: 446px;" src="{{asset('images/uploads/documents/'.$vImage) }}" alt="Los Angeles">
                                                  </div>
                                                @endforeach
                                                @else
                                                <div class="text-center">
                                                    <small class="font-weight-bold text-green">Vehicle Images not found</small>
                                                </div>
                                                @endif

                                            </div>

                                            <!-- Left and right controls -->
                                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                              <span class="carousel-control-prev-icon"></span>
                                            </a>
                                            <a class="carousel-control-next" href="#demo" data-slide="next">
                                              <span class="carousel-control-next-icon"></span>
                                            </a>

                                          </div>
                                    </div>

                                </div>



                            </div>
                        </div>
                        <div class="card mt-4">
                            <div class="card-header font-weight-bold bg-green text-white">VEHICLE  DOCUMENTS</div>
                            <div class="card-body">
                                <div class="row">

                                    <div class=" col-12 col-md-12">
                                        <div id="demo" class="carousel slide" data-ride="carousel">


                                            <!-- The slideshow -->
                                            <div class="carousel-inner">
                                                <img style="width:803px;height:446px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/1917_auto_registration_license.jpg/1200px-1917_auto_registration_license.jpg"/>
                                                @if (!$vImages->isEmpty())
                                                @foreach ($vImages as $key => $vImage)
                                                <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                                                    <img style="width: 803px; height: 446px;" src="{{asset('images/uploads/documents/'.$vImage) }}" alt="Los Angeles">
                                                  </div>
                                                @endforeach
                                                @else
                                                <div class="text-center">
                                                    <small class="font-weight-bold text-green">Vehicle Images not found</small>
                                                </div>
                                                @endif

                                            </div>

                                            <!-- Left and right controls -->
                                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                              <span class="carousel-control-prev-icon"></span>
                                            </a>
                                            <a class="carousel-control-next" href="#demo" data-slide="next">
                                              <span class="carousel-control-next-icon"></span>
                                            </a>

                                          </div>
                                    </div>

                                </div>



                            </div>
                        </div>

                        <div class="card mt-4">
                            <div class="card-header font-weight-bold bg-green text-white">CNIC FRONT BACK</div>
                            <div class="card-body">
                                <div class="row">

                                    <div class=" col-12 col-md-6">
                                       <img style="width: 394px; height: 245px; border:1px solid green" src="https://i.pinimg.com/originals/9e/6c/9b/9e6c9b3c155e80d609fcf50bf3c0df9f.jpg" alt="CNIC FRONT" />
                                    </div>

                                    <div class=" col-12 col-md-6">
                                        <img style="width: 394px; height: 245px;border:1px solid green" src="https://i.pinimg.com/originals/9e/6c/9b/9e6c9b3c155e80d609fcf50bf3c0df9f.jpg" alt="CNIC FRONT" />
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card mt-4">
                            <div class="card-header font-weight-bold bg-green text-white">LISENCE FRONT BACK</div>
                            <div class="card-body">
                                <div class="row">

                                    <div class=" col-12 col-md-6">
                                       <img style="width: 394px; height: 245px; border:1px solid green" src="http://4.bp.blogspot.com/-Q2cxpdWpR-o/VNXn0RxklyI/AAAAAAAAL8o/hTYHh7uxToQ/s1600/Driving%2BLicence%2BPakistan.jpg" alt="CNIC FRONT" />
                                    </div>

                                    <div class=" col-12 col-md-6">
                                        <img style="width: 394px; height: 245px;border:1px solid green" src="http://4.bp.blogspot.com/-Q2cxpdWpR-o/VNXn0RxklyI/AAAAAAAAL8o/hTYHh7uxToQ/s1600/Driving%2BLicence%2BPakistan.jpg" alt="CNIC FRONT" />
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
