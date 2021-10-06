<div>
    <div class="d-flex justify-content-end ">
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
                        <td class="d-flex d-inline">
                            <button class="btn bg-danger text-light btn-sm rounded-0"><i
                                    class="fa fa-eye"></i></button>
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
