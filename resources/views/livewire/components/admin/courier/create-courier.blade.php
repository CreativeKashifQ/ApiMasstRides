<div>
    @if(!$editable == false)
    {{-- Update Courier --}}

    <div class="modal-body">
        <div class="row">
            <div class="col-md-8 col-12">
                <h4>Edit Courier Here...</h4>
            </div>
        </div>
    </div>
    <div>
        <form wire:submit.prevent="update" enctype="multipart/form-data">
            @csrf
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
                <div class="col-md-12 col-12">
                    <div class="card-body">
                        {{-- Recipient Information --}}
                        <div class="car">
                            <div class="card-header bg-white"><strong class="text-dark">Recipient
                                    Information</strong></div>
                            <div class="card-body">


                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Full Name:</label>
                                            <input type="text" wire:model='courier.recipient_name'
                                                class="form-control rounded-0  @error('courier.recipient_name') is-invalid @enderror"
                                                placeholder="eg. Ahmad Raza">
                                            @error('courier.recipient_name')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.recipient_name') }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Phone Number:</label>
                                            <input type="text" wire:model='courier.recipient_phone'
                                                class="form-control rounded-0  @error('courier.recipient_phone') is-invalid @enderror"
                                                placeholder="eg.03015322456">
                                            @error('courier.recipient_phone')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.recipient_phone') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Full Address (Stored by TPL):</label>
                                            <small class="text-primary">{{$recipient_address}}</small>
                                            <div id="divSearchtwo" wire:ignore ></div>
                                                <div id="map"></div>
                                            @error('recipient_address')
                                                <small
                                                    class="text-danger ">{{ $errors->first('recipient_address') }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Email (Optional):</label>
                                            <input type="text" wire:model='courier.recipient_email'
                                                class="form-control rounded-0  @error('courier.recipient_email') is-invalid @enderror"
                                                placeholder="eg. user@gmail.com">
                                            @error('courier.recipient_email')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.recipient_email') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Courier Information !-->
                        <div class="car">
                            <div class="card-header bg-white "><strong class="text-dark">Courier
                                    Information</strong></div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-8 ">
                                        <div class="form-group">
                                            <label>Courier Tracking Number</label>
                                            <input type="text" disabled
                                                class="form-control rounded-0   @error('tracking_no') is-invalid @enderror"
                                                placeholder="MRC1125468" value="{{ $tracking_no }}">
                                            @error('tracking_no')
                                                <small class="text-danger ">{{ $errors->first('tracking_no') }}</small>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-4 col-4">
                                        <div class="form-group">
                                            <div style="margin-top:35px;">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a type="button" wire:click="GenerateTrackingNum"
                                                        class="btn btn-sm btn-success">Generate
                                                        TrackingNumber</a>
                                                    <a wire:click="ResetTrackingNum" type="button"
                                                        class="btn btn-sm btn-secondary">Reset</a>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Type Of Courier</label>
                                            <select class="form-control rounded-0" wire:model='couriertypeId'>
                                                <option>Select type</option>
                                                @foreach ($couriertypes as $couriertype)
                                                    <option value="{{ $couriertype->id }}">
                                                        {{ $couriertype->name }}
                                                        ({{ $couriertype->price }} Rs.)</option>
                                                @endforeach
                                            </select>
                                            @error('couriertypeId')
                                                <small class="text-danger ">{{ $errors->first('couriertypeId') }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Courier Content</label>
                                            <select class="form-control rounded-0" wire:model='couriercontentId'>
                                                <option>Select Content</option>
                                                @foreach ($couriercontents as $couriercontent)
                                                    <option value="{{ $couriercontent->id }}">
                                                        {{ $couriercontent->name }}
                                                        ({{ $couriercontent->price }} Rs.)</option>
                                                @endforeach

                                            </select>
                                            @error('couriercontentId')
                                                <small
                                                    class="text-danger ">{{ $errors->first('couriercontentId') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Weight (KG):</label>
                                            <input type="number" wire:model='Courierweight'
                                                class="form-control rounded-0  @error('Courierweight') is-invalid @enderror"
                                                placeholder=" 2">
                                            @error('Courierweight')
                                                <small class="text-danger ">{{ $errors->first('Courierweight') }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Pieces:</label>
                                            <input type="number" wire:model='Courierpieces'
                                                class="form-control rounded-0  @error('Courierpieces') is-invalid @enderror"
                                                placeholder="1">
                                            @error('Courierpieces')
                                                <small class="text-danger ">{{ $errors->first('Courierpieces') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Submitted Franchise (Where customer
                                                submitted):</label>

                                            <select class="form-control rounded-0" wire:model='OfranchiseId'>
                                                <option value="">Select Sending Franchise</option>
                                                @foreach ($courierweights as $courierweight)
                                                    @foreach ($franchises as $franchise)
                                                        @if ($courierweight->ofranchise_id == $franchise->id)
                                                            <option value="{{ $courierweight->id }}">
                                                                {{ $franchise->name }} </option>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </select>
                                            @error('OfranchiseId')
                                                <small class="text-danger ">{{ $errors->first('OfranchiseId') }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" wire:model="courier.ofranchise_saved"
                                                    class="form-check-input" value="">Save Permanently?
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Receiving Franchise (Who Collect the courier and
                                                deliver to Recipient Address)</label>
                                            <select class="form-control rounded-0" wire:model='DfranchiseId'>
                                                <option value="">SelectReceiving Franchise</option>
                                                @foreach ($courierweights as $courierweight)
                                                @foreach ($franchises as $franchise)
                                                    @if ($courierweight->ofranchise_id == $franchise->id)
                                                        <option value="{{ $courierweight->id }}">
                                                            {{ $franchise->name }} </option>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            </select>
                                            @error('DfranchiseId')
                                                <small class="text-danger ">{{ $errors->first('DfranchiseId') }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" wire:model="courier.dfranchise_saved"
                                                    class="form-check-input" value="">Save Permanently?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Sender Information -->
                        <div class="car">
                            <div class="card-header bg-white"><strong class="text-dark">Sender
                                    Information</strong></div>
                            <div class="card-body">


                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Full Name:</label>
                                            <input type="text" wire:model='courier.sender_name'
                                                class="form-control rounded-0  @error('courier.sender_name') is-invalid @enderror"
                                                placeholder="eg. Ahmad Raza">
                                            @error('courier.sender_name')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.sender_name') }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Phone Number:</label>
                                            <input type="text" wire:model='courier.sender_phone'
                                                class="form-control rounded-0  @error('courier.sender_phone') is-invalid @enderror"
                                                placeholder="eg.03015322456">
                                            @error('courier.sender_phone')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.sender_phone') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Full Address (Stored by TPL):</label>
                                            <small class="text-primary">{{$sender_address}}</small>
                                            <div id="divSearch" wire:ignore ></div>
                                                <div id="map"></div>
                                            @error('sender_address')
                                                <small
                                                    class="text-danger ">{{ $errors->first('sender_address') }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Email (Optional):</label>
                                            <input type="text" wire:model='courier.sender_email'
                                                class="form-control rounded-0  @error('courier.sender_email') is-invalid @enderror"
                                                placeholder="eg. user@gmail.com">
                                            @error('courier.sender_email')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.sender_email') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- PaymentInformation -->
                        <div class="car">
                            <div class="card-header bg-white"><strong class="text-dark">Booking Details
                                    (Payment Details)</strong></div>
                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-2 col-6">
                                        <div class="form-group">
                                            <label>CourierType Price</label>
                                            <input type="text" class="form-control" disabled
                                                value="{{ $couriertypePrice }}" />
                                            @error('courier.origin')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.origin') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <div class="form-group">
                                            <label>CourierContent Price</label>
                                            <input type="text" class="form-control" disabled
                                                value="{{ $couriercontentPrice }}" />
                                            @error('courier.origin')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.origin') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <div class="form-group">
                                            <label>Weight Of Courier Kg</label>
                                            <input type="text" class="form-control" disabled
                                                value="{{ $Courierweight }}" />
                                            @error('courier.origin')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.origin') }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-6">
                                        <div class="form-group">
                                            <label>Weight Per Kg</label>
                                            <input type="text" class="form-control" disabled
                                                value="{{ $DfranchiseLocationCourierKgPrice }}" />
                                            @error('courier.origin')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.origin') }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-6">
                                        <div class="form-group">
                                            <label>Courier Pieces</label>
                                            <input type="text" class="form-control" disabled
                                                value="{{ $Courierpieces }}" />
                                            @error('courier.origin')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.origin') }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-6">
                                        <div class="form-group">
                                            <label>Calcute Total Amount</label>
                                            <button type="button" class="btn btn-success btn-sm" wire:click="calculate"
                                                {{ $DfranchiseLocationCourierKgPrice ? '' : 'disabled' }}>
                                                <div class="spinner-border spinner-border-sm" role="status"
                                                    wire:loading>
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                                Calculate
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-12">

                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Discount %</label>
                                            <input type="number" class="form-control"
                                                wire:model.debounce.500ms="discount" />
                                            @error('courier.origin')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.origin') }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Total Amount Rs.</label>
                                            <input type="text" class="form-control" disabled
                                                value="{{ $TotalAmount }}.00" placeholder="0.00" />
                                            @error('courier.origin')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.origin') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">

                <button type="submit" class="btn bg-primary btn-sm rounded-0 text-white"><i
                        class="fa fa-lock text-white fa-1x mr-2"></i> Update Courier</button>
            </div>

        </form>
    </div>

    @else
    {{-- Create Courier --}}
    <div class="modal-body">
        <div class="row">
            <div class="col-md-8 col-12">
                <h4>Manage Courier Here...</h4>
            </div>
        </div>
    </div>
    <div>
        <form wire:submit.prevent="save" enctype="multipart/form-data">
            @csrf
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
                <div class="col-md-12 col-12">
                    <div class="card-body">
                        {{-- Recipient Information --}}
                        <div class="car">
                            <div class="card-header bg-white"><strong class="text-dark">Recipient
                                    Information</strong></div>
                            <div class="card-body">


                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Full Name:</label>
                                            <input type="text" wire:model='courier.recipient_name'
                                                class="form-control rounded-0  @error('courier.recipient_name') is-invalid @enderror"
                                                placeholder="eg. Ahmad Raza">
                                            @error('courier.recipient_name')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.recipient_name') }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Phone Number:</label>
                                            <input type="text" wire:model='courier.recipient_phone'
                                                class="form-control rounded-0  @error('courier.recipient_phone') is-invalid @enderror"
                                                placeholder="eg.03015322456">
                                            @error('courier.recipient_phone')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.recipient_phone') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Full Address (Stored by TPL):</label>
                                                <div id="divSearchtwo" wire:ignore ></div>
                                                <div id="map"></div>
                                            @error('recipient_address')
                                                <small
                                                    class="text-danger ">{{ $errors->first('recipient_address') }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Email (Optional):</label>
                                            <input type="text" wire:model='courier.recipient_email'
                                                class="form-control rounded-0  @error('courier.recipient_email') is-invalid @enderror"
                                                placeholder="eg. user@gmail.com">
                                            @error('courier.recipient_email')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.recipient_email') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Courier Information !-->
                        <div class="car">
                            <div class="card-header bg-white "><strong class="text-dark">Courier
                                    Information</strong></div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8 col-8 ">
                                        <div class="form-group">
                                            <label>Courier Tracking Number</label>
                                            <input type="text" disabled
                                                class="form-control rounded-0   @error('tracking_no') is-invalid @enderror"
                                                placeholder="MRC1125468" value="{{ $tracking_no }}">
                                            @error('tracking_no')
                                                <small class="text-danger ">{{ $errors->first('tracking_no') }}</small>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-4 col-4">
                                        <div class="form-group">
                                            <div style="margin-top:35px;">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a type="button" wire:click="GenerateTrackingNum"
                                                        class="btn btn-sm btn-success text-light">Generate
                                                        TrackingNumber</a>
                                                    <a wire:click="ResetTrackingNum" type="button"
                                                        class="btn btn-sm btn-secondary text-light">Reset</a>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Type Of Courier</label>
                                            <select class="form-control rounded-0" wire:model='couriertypeId'>
                                                <option>Select type</option>
                                                @foreach ($couriertypes as $couriertype)
                                                    <option value="{{ $couriertype->id }}">
                                                        {{ $couriertype->name }}
                                                        ({{ $couriertype->price }} Rs.)</option>
                                                @endforeach
                                            </select>
                                            @error('couriertypeId')
                                                <small class="text-danger ">{{ $errors->first('couriertypeId') }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Courier Content</label>
                                            <select class="form-control rounded-0" wire:model='couriercontentId'>
                                                <option>Select Content</option>
                                                @foreach ($couriercontents as $couriercontent)
                                                    <option value="{{ $couriercontent->id }}">
                                                        {{ $couriercontent->name }}
                                                        ({{ $couriercontent->price }} Rs.)</option>
                                                @endforeach

                                            </select>
                                            @error('couriercontentId')
                                                <small
                                                    class="text-danger ">{{ $errors->first('couriercontentId') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Weight (KG):</label>
                                            <input type="number" wire:model='Courierweight'
                                                class="form-control rounded-0  @error('Courierweight') is-invalid @enderror"
                                                placeholder=" 2">
                                            @error('Courierweight')
                                                <small class="text-danger ">{{ $errors->first('Courierweight') }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Pieces:</label>
                                            <input type="number" wire:model='Courierpieces'
                                                class="form-control rounded-0  @error('Courierpieces') is-invalid @enderror"
                                                placeholder="1">
                                            @error('Courierpieces')
                                                <small class="text-danger ">{{ $errors->first('Courierpieces') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Submitted Franchise (Where customer
                                                submitted):</label>

                                            <select class="form-control rounded-0" wire:model='OfranchiseId'>
                                                <option value="">Select Sending Franchise</option>
                                                @foreach ($courierweights as $courierweight)
                                                    @foreach ($franchises as $franchise)
                                                        @if ($courierweight->ofranchise_id == $franchise->id)
                                                            <option value="{{ $courierweight->id }}">
                                                                {{ $franchise->name }} </option>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </select>
                                            @error('OfranchiseId')
                                                <small class="text-danger ">{{ $errors->first('OfranchiseId') }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" wire:model="courier.ofranchise_saved"
                                                    class="form-check-input" value="">Save Permanently?
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Receiving Franchise (Who Collect the courier and
                                                deliver to Recipient Address)</label>
                                            <select class="form-control rounded-0" wire:model='DfranchiseId'>
                                                <option value="">SelectReceiving Franchise</option>
                                                @foreach ($courierweights as $courierweight)
                                                @foreach ($franchises as $franchise)
                                                    @if ($courierweight->ofranchise_id == $franchise->id)
                                                        <option value="{{ $courierweight->id }}">
                                                            {{ $franchise->name }} </option>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            </select>
                                            @error('DfranchiseId')
                                                <small class="text-danger ">{{ $errors->first('DfranchiseId') }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="checkbox" wire:model="courier.dfranchise_saved"
                                                    class="form-check-input" value="">Save Permanently?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Sender Information -->
                        <div class="car">
                            <div class="card-header bg-white"><strong class="text-dark">Sender
                                    Information</strong></div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Full Name:</label>
                                            <input type="text" wire:model='courier.sender_name'
                                                class="form-control rounded-0  @error('courier.sender_name') is-invalid @enderror"
                                                placeholder="eg. Ahmad Raza">
                                            @error('courier.sender_name')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.sender_name') }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Phone Number:</label>
                                            <input type="text" wire:model='courier.sender_phone'
                                                class="form-control rounded-0  @error('courier.sender_phone') is-invalid @enderror"
                                                placeholder="eg.03015322456">
                                            @error('courier.sender_phone')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.sender_phone') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Full Address (Stored by TPL):</label>
                                                <div id="divSearch" wire:ignore >
                                                </div>
                                                <div id="map"></div>
                                            @error('sender_address')
                                                <small
                                                    class="text-danger ">{{ $errors->first('sender_address') }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Email (Optional):</label>
                                            <input type="text" wire:model.defer='courier.sender_email'
                                                class="form-control rounded-0  @error('courier.sender_email') is-invalid @enderror"
                                                placeholder="eg. user@gmail.com">
                                            @error('courier.sender_email')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.sender_email') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- PaymentInformation -->
                        <div class="car">
                            <div class="card-header bg-white"><strong class="text-dark">Booking Details
                                    (Payment Details)</strong></div>
                            <div class="card-body">

                                <div class="row">

                                    <div class="col-md-2 col-6">
                                        <div class="form-group">
                                            <label>CourierType Price</label>
                                            <input type="text" class="form-control" disabled
                                                value="{{ $couriertypePrice }}" />
                                            @error('courier.origin')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.origin') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <div class="form-group">
                                            <label>CourierContent Price</label>
                                            <input type="text" class="form-control" disabled
                                                value="{{ $couriercontentPrice }}" />
                                            @error('courier.origin')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.origin') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-6">
                                        <div class="form-group">
                                            <label>Weight Of Courier Kg</label>
                                            <input type="text" class="form-control" disabled
                                                value="{{ $Courierweight }}" />
                                            @error('courier.origin')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.origin') }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-6">
                                        <div class="form-group">
                                            <label>Weight Per Kg</label>
                                            <input type="text" class="form-control" disabled
                                                value="{{ $DfranchiseLocationCourierKgPrice }}" />
                                            @error('courier.origin')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.origin') }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-6">
                                        <div class="form-group">
                                            <label>Courier Pieces</label>
                                            <input type="text" class="form-control" disabled
                                                value="{{ $Courierpieces }}" />
                                            @error('courier.origin')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.origin') }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-2 col-6">
                                        <div class="form-group">
                                            <label>Calcute Total Amount</label>
                                            <button type="button" class="btn btn-success btn-sm" wire:click="calculate"
                                                {{ $DfranchiseLocationCourierKgPrice ? '' : 'disabled' }}>
                                                <div class="spinner-border spinner-border-sm" role="status"
                                                    wire:loading wire:target='calculate'>
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                                Calculate
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-12">

                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Discount %</label>
                                            <input type="number" class="form-control"
                                                wire:model.debounce.500ms="discount" />
                                            @error('courier.origin')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.origin') }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Total Amount Rs.</label>
                                            <input type="text" class="form-control" disabled
                                                value="{{ $TotalAmount }}.00" placeholder="0.00" />
                                            @error('courier.origin')
                                                <small
                                                    class="text-danger ">{{ $errors->first('courier.origin') }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm rounded-0" data-dismiss="modal">Close</button>
                <button type="submit" class="btn bg-success btn-sm rounded-0 text-white"><i
                        class="fa fa-lock text-white fa-1x mr-2"></i> Save Courier</button>
            </div>

        </form>
    </div>

    @endif





</div>




