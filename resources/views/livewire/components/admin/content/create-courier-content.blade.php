<div>

    <!-- Modal to Update Records -->
    <div wire:ignore.self class="modal fade" id="UpdateCourierContentModal" tabindex="-1" role="dialog"
        aria-labelledby="UpdateCourierContentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form wire:submit.prevent="update" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Courier Content</h5>
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
                                    <label>Courier Content Name</label>
                                    <input type="text" wire:model.defer='couriercontent.name'
                                        class="form-control rounded-0  @error('couriercontent.name') is-invalid @enderror"
                                        placeholder="Normal,Fragile">
                                    @error('couriercontent.name')
                                        <span class="text-danger ">{{ $errors->first('couriercontent.name') }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Content Price</label>
                                    <input type="number" wire:model.defer='couriercontent.price'
                                        class="form-control rounded-0  @error('couriercontent.price') is-invalid @enderror"
                                        placeholder="50">
                                    @error('couriercontent.price')
                                        <span class="text-danger ">{{ $errors->first('couriercontent.price') }}</span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm rounded-0"
                            data-dismiss="modal">Close</button>

                        <button type="submit" class="btn bg-primary btn-sm rounded-0 text-white"><i
                                class="fa fa-plus text-white fa-1x mr-2"></i>Update Courier Content</button>

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
                <h4>Manage Courier Content Here...</h4>
            </div>
            <div class="col-md-4 col-12">
                <a wire:click='resetForm' type="button" class="btn btn-primary btn-sm rounded-0 pull-right"
                    data-toggle="modal" data-target="#CourierContentModal">
                    Add Courier Content
                </a>
            </div>

        </div>
        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="CourierContentModal" tabindex="-1" role="dialog"
            aria-labelledby="CourierTypeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <form wire:submit.prevent="store" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Courier Content</h5>
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
                                        <label>Courier Content Name</label>
                                        <input type="text" wire:model.defer='couriercontent.name'
                                            class="form-control rounded-0  @error('couriercontent.name') is-invalid @enderror"
                                            placeholder="Normal, Fragile">
                                        @error('couriercontent.name')
                                            <span class="text-danger ">{{ $errors->first('couriercontent.name') }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label>Content Price</label>
                                        <input type="number" wire:model.defer='couriercontent.price'
                                            class="form-control rounded-0  @error('couriercontent.price') is-invalid @enderror"
                                            placeholder="50">
                                        @error('couriercontent.price')
                                            <span class="text-danger ">{{ $errors->first('couriercontent.price') }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm rounded-0"
                                data-dismiss="modal">Close</button>

                            <button type="submit" class="btn bg-success btn-sm rounded-0 text-white"><i
                                    class="fa fa-plus text-white fa-1x mr-2"></i>Add Courier Content</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
