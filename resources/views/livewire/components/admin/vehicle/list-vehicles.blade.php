<div>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h5 class="mb-0 text-green font-weight-bold">Vehicles Listing</h5>
            <a href="{{route('create.vehicle')}}"
                class=" float-right d-sm-inline-block btn btn-sm bg-green shadow-sm text-white"><i
                    class="fas fa-plus fa-sm text-white "></i> Add Vehicle </a>
        </div>

        <div class="table-responsive">

            <table class="table table-striped  table-sm  ">
                <thead>
                    <tr style="font-size: 13px;" class="text-green">
                        <th>#</th>
                        <th>Stock#</th>
                        <th>Reg.#</th>
                        <th>Make</th>
                        <th>Name</th>
                        <th>Model</th>
                        <th>Engine</th>
                        <th>Type</th>
                        <th>Color</th>
                        <th>Transmission</th>
                        <th>FuleType</th>
                        <th>Reg.Date</th>
                        <th>Tracker</th>
                        <th>RegisterFor</th>
                        <th>Franchise</th>
                        <th>Class</th>
                        <th>Year</th>
                        <th>Country</th>
                        <th>Image</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($vehicles) && $vehicles->count() > 0)
                        @foreach ($vehicles as $key => $vehicle)
                            <tr style="font-size:13px;">
                                <td>{{ ++$key }}</td>
                                <td>MR-VH-00{{ $vehicle->id }}</td>
                                <td>{{ $vehicle->reg_no }}</td>
                                <td>{{ $vehicle->make->name }}</td>
                                <td>{{ $vehicle->name->name }}</td>
                                <td>{{ $vehicle->model->name }}</td>
                                <td>{{ $vehicle->engine->name }}</td>
                                <td>{{ $vehicle->type->name }}</td>
                                <td>{{ $vehicle->color->name }}</td>
                                <td>{{ $vehicle->transmission->type }}</td>
                                <td>{{ $vehicle->fuletype->name }}</td>
                                <td>{{ $vehicle->registrationdate }}</td>
                                <td>{{ $vehicle->tracker }}</td>
                                <td>{{ $vehicle->registerfor->name }}</td>
                                <td>{{ $vehicle->franchise->name }}</td>
                                <td>{{ $vehicle->class }}</td>
                                <td>{{ $vehicle->year }}</td>
                                <td>{{ $vehicle->country }}</td>
                                <td>
                                <a
                                        href="{{asset('images/uploads/vehicles/'.$vehicle->image) }}"><img
                                            class="img-thumbnail" style="height:40px; width:100px;"
                                            src="{{asset('images/uploads/vehicles/'.$vehicle->image) }}" alt="Vhicle Image"></a>
                                </td>
                                <td>{{ Carbon\Carbon::parse($vehicle->created_at)->diffForHumans() }}</td>
                                <td class="d-flex d-inline">
                                    <a href="{{route('owner.detail',$vehicle->id)}}"
                                    class="btn bg-primary text-white btn-sm"><i class="fa fa-eye"></i></a> |
                                    <a href="{{route('edit.vehicle',$vehicle->id)}}"
                                        class="btn bg-green text-white btn-sm"><i class="fa fa-pencil"></i></a> |
                                    <a class="btn bg-danger text-light btn-sm"
                                        href="javascript:void(0)" wire:click='delete({{$vehicle->id}})'><i
                                            class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="22" class="text-center"><small>No, Vehicle Found</small></td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>

</div>
