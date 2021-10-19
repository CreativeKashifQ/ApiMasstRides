<div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="mb-0 text-green font-weight-bold">Vehicle Requests</h5>

    </div>
    <div class="row">
        <div class="col-md-4 col-12">
            <div class="form-group">
                <input type="text" class="form-control rounded-0" wire:model='search' placeholder="Search name" />
            </div>

        </div>
    </div>
    <table class="table  table-striped   ">
        <thead class="bg-green">
            <tr style="font-size: 13px;" class="text-white">
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>CNIC</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @if (isset($requests) && $requests->count() > 0)
                @foreach ($requests as $key => $request)
                    <tr style="font-size: 13px;" class="text-green">
                        <td>{{ ++$key }}</td>
                        <td>{{ $request->name }}</td>
                        <td>{{ $request->email }}</td>
                        <td>{{ $request->phone }}</td>
                        <td>{{ $request->cnic }}</td>
                        <td>{{ $request->city }}</td>
                        <td>{{ $request->state }}</td>
                        <td>{{ $request->country }}</td>
                        <td class="d-flex d-inline">
                            <a href="{{route('vehicle-request.gallery',$request->id)}}" class="btn btn-success bg-green btn-sm rounded-0">More..</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="9" class="text-center"><small>No, Requets Found</small></td>
                </tr>
            @endif

        </tbody>
    </table>
</div>
