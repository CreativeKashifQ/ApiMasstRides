<div>

    <!-- Modal to Update Records -->
    <div wire:ignore.self class="modal fade" id="UpdateCourierWeightModal" tabindex="-1" role="dialog"
        aria-labelledby="UpdateCourierWeightModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form wire:submit.prevent="update" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Courier Weight</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
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
                        <div class="row">

                          <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Sending Franchise</label>
                                    <select class="form-control rounded-0"
                                        wire:model.defer='courier.ofranchise_id'>
                                        <option>Select Sending Franchise</option>
                                        <option value="1">Lohore Mall Road</option>
                                        @foreach($franchises  as $franchise)
                                        <option value="{{$franchise->id}}">{{$franchise->name}}</option>
                                        @endforeach
                                    </select>
                                        @error('courier.ofranchise_id')
                                            <span class="text-danger ">{{ $errors->first('courier.ofranchise_id') }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Select Receiving Franchise</label>
                                    <select class="form-control rounded-0"
                                        wire:model.defer='courier.dfranchise_id'>
                                        <option>Select Receiving Franchise</option>
                                        <option value="1">Lohore Mall Road</option>
                                        @foreach($franchises  as $franchise)
                                        <option value="{{$franchise->id}}">{{$franchise->name}}</option>
                                        @endforeach
                                    </select>
                                        @error('courier.dfranchise_id')
                                            <span class="text-danger ">{{ $errors->first('courier.dfranchise_id') }}</span>
                                        @enderror
                                    </div>
                                </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Courier Weight (Kg)</label>
                                    <input type="number" wire:model.defer='courier.weight'
                                        class="form-control rounded-0  @error('courier.weight') is-invalid @enderror"
                                        placeholder="1 Kg">
                                    @error('courier.weight')
                                        <span class="text-danger ">{{ $errors->first('courier.weight') }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Courier Price</label>
                                    <input type="number" wire:model.defer='courier.price'
                                        class="form-control rounded-0  @error('courier.price') is-invalid @enderror"
                                        placeholder="50Rs.">
                                    @error('courier.price')
                                        <span class="text-danger ">{{ $errors->first('courier.price') }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm rounded-0"
                            data-dismiss="modal">Close</button>

                        <button type="submit" class="btn bg-primary btn-sm rounded-0 text-white"><i
                                class="fa fa-plus text-white fa-1x mr-2"></i>Update Courier Wight</button>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- *************************************************************-->
        <!-- Modal to Add Records -->
    <div class="modal-body">
        <div class="row">
            <div class="col-md-8 col-12">
                <h4>Manage Courier Weight With Locations & Price Here...</h4>
            </div>
            <div class="col-md-4 col-12">
                <a wire:click='resetForm' type="button" class="btn btn-primary btn-sm rounded-0 pull-right"
                    data-toggle="modal" data-target="#CourierWeightModal">
                    Add Courier Type
                </a>
            </div>

        </div>
        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="CourierWeightModal" tabindex="-1" role="dialog"
            aria-labelledby="CourierTypeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <form wire:submit.prevent="store" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Courier Type</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
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
                            <div class="row">

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Sending Franchise</label>
                                    <select class="form-control rounded-0"
                                        wire:model.defer='courier.ofranchise_id'>
                                        <option>Select Sending Franchise</option>
                                        <option value="1">Lohore Mall Road</option>
                                        @foreach($franchises  as $franchise)
                                        <option value="{{$franchise->id}}">{{$franchise->name}}</option>
                                        @endforeach
                                    </select>
                                        @error('courier.ofranchise_id')
                                            <span class="text-danger ">{{ $errors->first('courier.ofranchise_id') }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Select Receiving Franchise</label>
                                    <select class="form-control rounded-0"
                                        wire:model.defer='courier.dfranchise_id'>
                                        <option>Select Receiving Franchise</option>
                                        <option value="1">Lohore Mall Road</option>
                                        @foreach($franchises  as $franchise)
                                        <option value="{{$franchise->id}}">{{$franchise->name}}</option>
                                        @endforeach
                                    </select>
                                        @error('courier.dfranchise_id')
                                            <span class="text-danger ">{{ $errors->first('courier.dfranchise_id') }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Courier Weight (Kg)</label>
                                        <input type="number" wire:model.defer='courier.weight'
                                            class="form-control rounded-0  @error('courier.weight') is-invalid @enderror"
                                            placeholder="1 Kg">
                                        @error('courier.weight')
                                            <span class="text-danger ">{{ $errors->first('courier.weight') }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Courier Price</label>
                                        <input type="number" wire:model.defer='courier.price'
                                            class="form-control rounded-0  @error('courier.price') is-invalid @enderror"
                                            placeholder="50Rs.">
                                        @error('courier.price')
                                            <span class="text-danger ">{{ $errors->first('courier.price') }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm rounded-0"
                                data-dismiss="modal">Close</button>

                            <button type="submit" class="btn bg-success btn-sm rounded-0 text-white"><i
                                    class="fa fa-plus text-white fa-1x mr-2"></i>Add Courier Weight</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
