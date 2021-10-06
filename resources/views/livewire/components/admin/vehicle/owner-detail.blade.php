<div>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="mb-4">
            <h5 class="mb-0 text-green font-weight-bold">Vehicle Owner Detail</h5>
            <br>
            <a href="{{route('list.vehicles')}}" class="btn btn-warning btn-sm text-dark font-weight-bold">Back</a>
        </div>

        <div class="table-responsive">

            <table class="table table-striped  table-sm  ">
                <thead>
                    <tr style="font-size: 13px;" class="text-green">
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>CNIC</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Company</th>
                        <th>Co.#</th>
                        <th>File</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>

                            <tr style="font-size:13px;">

                                <td>{{ $vowner->id }}</td>
                                <td>{{ $vowner->o_name }}</td>
                                <td>{{ $vowner->o_email }}</td>
                                <td>{{ $vowner->o_phone }}</td>
                                <td>{{ $vowner->o_cnic }}</td>
                                <td>{{ $vowner->o_address }}</td>
                                <td>{{ $vowner->o_status }}</td>
                                <td>{{ $vowner->o_company }}</td>
                                <td>{{ $vowner->o_company_number }}</td>
                                <td>
                                <a
                                    href="{{asset('images/uploads/documents/'.$vowner->o_company_file) }}"><img
                                            class="img-thumbnail" style="height:40px; width:100px;"
                                            src="{{asset('images/uploads/documents/'.$vowner->o_company_file) }}" alt="Vehicle Document"></a>
                                </td>
                                <td>{{ Carbon\Carbon::parse($vowner->created_at)->diffForHumans() }}</td>

                            </tr>



                </tbody>
            </table>
        </div>
    </div>

</div>
