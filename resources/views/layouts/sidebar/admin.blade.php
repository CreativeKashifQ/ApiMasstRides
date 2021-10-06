<!-- Heading -->
<div class="sidebar-heading text-warning">
    Permissions
</div>
<!-- Users- Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('users.list') }}">
        <i class="fa fa-users text-light"></i>
        <span class="text-color-black">Users</span></a>
</li>

<!-- Franchise listing -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('franchise.show') }}">
        <i class="fa fa-building text-light"></i>
        <span class="text-color-black">Franchises</span></a>
</li>

<!-- Customer listing -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('customer.show') }}">
        <i class="fa fa-users text-light"></i>
        <span class="text-color-black">Customers</span></a>
</li>


<!-- Vehicle -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('driver.show') }}">
        <i class="fa fa-users text-light"></i>
        <span class="text-color-black">Drivers</span></a>
</li>


<!-- Vehicle -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('list.vehicles') }}">
        <i class="fa fa-car text-light"></i>
        <span class="text-color-black">Vehicles</span></a>
</li>
<!-- Vehicle Requests -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('list.vehicle_request') }}">
        <i class="fa fa-car text-light"></i>
        <span class="text-color-black">Vehicles Requests</span></a>
</li>

{{-- <!-- HRM listing Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseEmployee" aria-expanded="true"
        aria-controls="collapseTwo">
        <i class="fa fa-users text-light"></i>
        <span class="text-color-black">Employees</span>
    </a>
    <div id="collapseEmployee" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-color-sky py-2 collapse-inner rounded">
            <h6 class="collapse-header text-warning ">Custom Employees:</h6>
            <a class="collapse-item" href="{{ route('employee.show') }}"> All Employees</a>
            <a class="collapse-item" href="{{ route('employee.create') }}"> Add Employee</a>
        </div>
    </div>
</li>


<li class="nav-item">
    <div class="nav-link collapsed collapse-item " data-toggle="collapse" data-target="#collapseBooking"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fa fa-car text-light"></i>
        <a href="{{ route('rentacar.index') }}" class=" text-decoration-none text-light" style="font-size:14px;">Rent
            A Car</a>
    </div>

    <div id="collapseBooking" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-color-sky py-2 collapse-inner rounded">
            <div class="sidebar-heading mb-2">
                <strong class="ml-2 text-warning">Bookings</strong>
            </div>
            <ul class="list-unstyled accordion" id="accordionInnerbar">
                <li class="nav-item " style="margin-bottom: 0px!important">
                    <a class="nav-link collapsed " style="padding-top: 0px!important; padding-bottom: 0px!important"
                        data-toggle="collapse" data-target="#collapseVahicle" aria-expanded="true"
                        aria-controls="collapseTwo">
                        <i class="fa fa-car text-light"></i>
                        <span class="text-color-black">Reservations</span>
                    </a>
                    <div id="collapseVahicle" class="collapse" aria-labelledby="headingTwo"
                        data-parent="#accordionInnerbar">
                        <a class=" collapse-item list-inline-item" href="{{ route('reservation.create') }}">Add
                            Reservation </a>
                        <a class=" collapse-item list-inline-item" href="{{ route('reservation.index') }}">All Rent A
                            Car</a>
                    </div>
                </li>
            </ul>

        </div>
    </div>
</li>
<!-- Goods&Transport -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('goodstransport.analysis') }}">
        <i class="fas fa-fw fa-car text-light"></i>
        <span class="text-color-black">Goods&Transport</span></a>
</li>

<!-- Courier -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('courier.analysis') }}">
        <i class="fas fa-fw fa-shopping-cart text-light"></i>
        <span class="text-color-black">Courier</span></a>
</li>

<!-- Tours&Trevals -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('tourtravel.index') }}">
        <i class="fas fa-fw fa-car text-light"></i>
        <span class="text-color-black">Tour&Travels</span></a>
</li>


<!-- Vehicle Management -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('vehiclemanagement.show') }}">
        <i class="fas fa-fw fa-car text-light"></i>
        <span class="text-color-black">Vehicle Mangmt.</span></a>
</li>


<li class="nav-item">
    <a class="nav-link" href="{{ route('booking.show') }}">
        <i class="fas fa-fw fa-car text-light"></i>
        <span class="text-color-black">Workshop On Wheels</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider my-0">
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading text-warning">
    Accounts/Administration
</div>
<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="{{ route('reports.index') }}">
        <i class="fas fa-file text-light"></i>
        <span class="text-color-black">Reports</span></a>
</li>

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="{{ route('admincontrol.index') }}">
        <i class="fas fa-user text-light"></i>
        <span class="text-color-black">Admin</span></a>
</li> --}}
