<div>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="mb-0 text-green font-weight-bold">Edit Vehicle Detail</h5>
            <a href="{{ route('list.vehicles') }}"
                class=" float-right d-sm-inline-block btn btn-sm bg-green shadow-sm text-white"><i
                    class="fas fa-plus fa-sm text-white "></i> Show Vehicles </a>
        </div>

        <form wire:submit.prevent='update' enctype="multipart/form-data">
            @csrf
            <div class="modal-body p-0">
                {{-- vehicle details --}}
                <div class="card">
                    <div class="card-header bg-green text-white"><strong>Edit Details</strong></div>
                    <div class="card-body">
                        <div class="row">
                            {{-- register no --}}
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Reg.No</label>
                                    <input type="text"
                                        class="form-control @error('vehicle.reg_no') is-invalid @enderror"
                                        wire:model.defer="vehicle.reg_no" placeholder="i.e. LHR-1234 ">
                                    @error('vehicle.reg_no')
                                        <span class="invalid-feedback">{{ $errors->first('vehicle.reg_no') }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- make --}}
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Select Make</label>
                                    <select class="form-control @error('SelectedMake') is-invalid @enderror"
                                        wire:model="SelectedMake">
                                        <option selected>__Select Make__</option>
                                        @foreach ($vehicleMakes as $make)
                                            <option value="{{ $make->id }}">{{ $make->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('SelectedMake')
                                        <span class="invalid-feedback">{{ $errors->first('SelectedMake') }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- name --}}
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Select Name</label>
                                    <select class="form-control @error('SelectedName') is-invalid @enderror"
                                        wire:model="SelectedName">
                                        <option selected>__Select Name__</option>
                                        @if ($VehicleNames != null)
                                            @foreach ($VehicleNames as $vehicle)
                                                <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('SelectedName')
                                        <span class="invalid-feedback">{{ $errors->first('SelectedName') }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- model --}}

                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Select Model</label>
                                    <select class="form-control @error('SelectedModel') is-invalid @enderror"
                                        wire:model="SelectedModel">
                                        <option selected>__Select Model__</option>
                                        @if ($VehicleModels != null)
                                            @foreach ($VehicleModels as $model)
                                                <option value="{{ $model->id }}">{{ $model->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('SelectedModel')
                                        <span class="invalid-feedback">{{ $errors->first('SelectedModel') }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- engines --}}
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Select Engine</label>
                                    <input type="text" placeholder="Engine"
                                        class="form-control @error('VehicleEngine') is-invalid @enderror"
                                        wire:model="VehicleEngine" readonly>
                                    @error('VehicleEngine')
                                        <span class="invalid-feedback">{{ $errors->first('VehicleEngine') }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- type --}}
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Select Type</label>
                                    <input type="text" placeholder="Type"
                                        class="form-control @error('VehicleType') is-invalid @enderror"
                                        wire:model="VehicleType" readonly>
                                    @error('VehicleType')
                                        <span class="invalid-feedback">{{ $errors->first('VehicleType') }}</span>
                                    @enderror
                                </div>
                            </div>


                            {{-- color --}}
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Select Color</label>
                                    <select class="form-control @error('vehicle.colorid') is-invalid @enderror"
                                        wire:model.defer="vehicle.colorid">
                                        <option selected>__Select Color__</option>
                                        @foreach ($vehilceColors as $color)
                                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('vehicle.colorid')
                                        <span class="invalid-feedback">{{ $errors->first('vehicle.colorid') }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Transmission --}}
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Select Transmission</label>
                                    <select class="form-control @error('vehicle.transmissionid') is-invalid @enderror"
                                        wire:model.defer="vehicle.transmissionid">
                                        <option selected>__Select Transmission__</option>
                                        @foreach ($vehicleTransmissions as $transmission)
                                            <option value="{{ $transmission->id }}">{{ $transmission->type }}</option>
                                        @endforeach
                                    </select>
                                    @error('vehicle.transmissionid')
                                        <span
                                            class="invalid-feedback">{{ $errors->first('vehicle.transmissionid') }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Fule Type --}}
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Select Fule Type</label>
                                    <select class="form-control @error('vehicle.fuletypeid') is-invalid @enderror"
                                        wire:model.defer="vehicle.fuletypeid">
                                        <option selected>__Select Fuletype__</option>
                                        @foreach ($vehicleFuletypes as $fule)
                                            <option value="{{ $fule->id }}">{{ $fule->name }}</option>
                                        @endforeach

                                    </select>
                                    @error('vehicle.fuletypeid')
                                        <span class="invalid-feedback">{{ $errors->first('vehicle.fuletypeid') }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Registration Date --}}
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Registration Date</label>
                                    <input type="date"
                                        class="form-control @error('vehicle.registrationdate') is-invalid @enderror" wire:model="vehicle.registrationdate">
                                    @error('vehicle.registrationdate')
                                        <span
                                            class="invalid-feedback">{{ $errors->first('vehicle.registrationdate') }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Tracker --}}
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Tracker</label>
                                    <select class="form-control @error('vehicle.tracker') is-invalid @enderror"
                                        wire:model.defer="vehicle.tracker">
                                        <option selected>__Select Tracker__</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    @error('vehicle.tracker')
                                        <span class="invalid-feedback">{{ $errors->first('vehicle.tracker') }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Register For --}}
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Register For</label>
                                    <select class="form-control @error('vehicle.registerforid') is-invalid @enderror"
                                        wire:model.defer="vehicle.registerforid">
                                        <option selected>__Register For__</option>
                                        @foreach ($vehicleRegisterfors as $regfor)
                                            <option value="{{ $regfor->id }}">{{ $regfor->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('vehicle.registerforid')
                                        <span class="invalid-feedback">{{ $errors->first('vehicle.registerforid') }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Franchise --}}
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Franchise</label>
                                    @if (auth()->user()->isAdmin())
                                        <select class="form-control @error('vehicle.franchiseid') is-invalid @enderror"
                                            wire:model.defer="vehicle.franchiseid">
                                            <option selected>__Franchise__</option>
                                            @foreach ($franchises as $franchise)
                                                <option value="{{ $franchise->id }}">{{ $franchise->name }}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <input type="text"
                                            class="form-control @error('vehicle.franchiseid') is-invalid @enderror"
                                            placeholder="Multan Franchise">
                                    @endif
                                    @error('vehicle.franchiseid')
                                        <span class="invalid-feedback">{{ $errors->first('vehicle.franchiseid') }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Class --}}
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Class</label>
                                    <select class="form-control @error('vehicle.class') is-invalid @enderror"
                                        wire:model.defer="vehicle.class">
                                        <option selected>__Select Class__</option>
                                        <option value="Economy">Economy</option>
                                        <option value="Business">Business</option>
                                    </select>
                                    @error('vehicle.class')
                                        <span class="invalid-feedback">{{ $errors->first('vehicle.class') }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- year --}}
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Year</label>
                                    <input type="text" class="form-control @error('vehicle.year') is-invalid @enderror"
                                        placeholder="i.e. 2021 " wire:model="vehicle.year">
                                    @error('vehicle.year')
                                        <span class="invalid-feedback">{{ $errors->first('vehicle.year') }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Country --}}
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Counrty</label>
                                    <input type="text"
                                        class="form-control @error('vehicle.country') is-invalid @enderror"
                                        placeholder="Pakistan" wire:model="vehicle.country" readonly>
                                    @error('vehicle.country')
                                        <span class="invalid-feedback">{{ $errors->first('vehicle.country') }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                {{-- vehicle image upload --}}
                <div class="card my-3">
                    <div class="card-header bg-green text-white">
                        <strong>Upload Image</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 ">

                                <div class=" d-flex justify-content-center pb-3">
                                    @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}"  style="width: 200px; height: 200px;">
                                    @else
                                    <img  src="{{ asset('images/vehiclepic.png') }}" alt="car image"
                                        style="width: 200px; height: 200px;">
                                    @endif
                                </div>
                                <div class=" col-md-6 offset-md-3 ">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        wire:model="image">
                                    @error('image')
                                        <span class="invalid-feedback">{{ $errors->first('image') }}</span>
                                    @enderror

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- owner information --}}
                <div class="card">
                    <div class="card-header bg-green text-white"><strong>Owner Information</strong></div>
                    <div class="card-body">
                        <div class="row">
                            {{-- name --}}
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Name</label>
                                    <input type="text" class="form-control @error('o_name') is-invalid @enderror"
                                        wire:model.defer="o_name" placeholder="i.e. Ali Raza ">
                                    @error('o_name')
                                        <span class="invalid-feedback">{{ $errors->first('o_name') }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Email --}}
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Email</label>
                                    <input type="text" class="form-control @error('o_email') is-invalid @enderror"
                                        wire:model.defer="o_email" placeholder="i.e. aliraza@gmail.com ">
                                    @error('o_email')
                                        <span class="invalid-feedback">{{ $errors->first('o_email') }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Phone --}}
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Phone</label>
                                    <input type="text" class="form-control @error('o_phone') is-invalid @enderror"
                                        wire:model.defer="o_phone" placeholder="i.e. 03012342849 ">
                                    @error('o_phone')
                                        <span class="invalid-feedback">{{ $errors->first('o_phone') }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- CNIC --}}
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">CNIC</label>
                                    <input type="text" class="form-control @error('o_cnic') is-invalid @enderror"
                                        wire:model.defer="o_cnic" placeholder="i.e. 3660221362795 ">
                                    @error('o_cnic')
                                        <span class="invalid-feedback">{{ $errors->first('o_cnic') }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- Address --}}
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Address</label>
                                    <input type="text" class="form-control @error('o_address') is-invalid @enderror"
                                        wire:model.defer="o_address" placeholder="i.e. Multan, Pakisatn ">
                                    @error('o_address')
                                        <span class="invalid-feedback">{{ $errors->first('o_address') }}</span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Owner --}}
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="inputAddress" class="text-color-black">Owner</label>
                                    <select class="form-control @error('o_status') is-invalid @enderror"
                                        wire:model="o_status">
                                        <option selected>__Select Owner__</option>
                                        <option value="individual">Individual</option>
                                        <option value="company">Company</option>
                                    </select>
                                    @error('o_status')
                                        <span class="invalid-feedback">{{ $errors->first('o_status') }}</span>
                                    @enderror
                                </div>
                            </div>
                            @if ($toggle)
                                {{-- Compnay --}}
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label for="inputAddress" class="text-color-black">Compnay Name</label>
                                        <input type="text"
                                            class="form-control @error('o_company_name') is-invalid @enderror"
                                            wire:model.defer="o_company_name" placeholder="i.e. MasstRides ">
                                        @error('o_company_name')
                                            <span class="invalid-feedback">{{ $errors->first('o_company_name') }}</span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Compnay number --}}
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label for="inputAddress" class="text-color-black">Compnay Number</label>
                                        <input type="text"
                                            class="form-control @error('o_company_number') is-invalid @enderror"
                                            wire:model.defer="o_company_number" placeholder="i.e 84372859584 ">
                                        @error('o_company_number')
                                            <span
                                                class="invalid-feedback">{{ $errors->first('o_company_number') }}</span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- Vehicle Documents --}}
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label for="inputAddress" class="text-color-black">Attach Decument</label>
                                        <input type="file"
                                            class="form-control @error('o_company_file') is-invalid @enderror"
                                            wire:model="o_company_file">
                                        @error('o_company_file')
                                            <span class="invalid-feedback">{{ $errors->first('o_company_file') }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer ">
                <button type="submit" class="btn bg-green btn-sm rounded-0 text-white d-flex d-inline ">
                    <div wire:loading wire:target='store'>
                        <div class="spinner-border spinner-border-sm mr-2" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    Update Vehicle
                </button>
            </div>
        </form>

    </div>

</div>
