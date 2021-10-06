        <div id="success"></div>
       <table class="table   table-striped   " >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($users) && $users->count() > 0)
                @foreach($users as $key=> $user)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @foreach($user->roles as $role)
                           {{$role->name}},
                        @endforeach
                    </td>
                    <td class="d-flex d-inline">
                        <a onclick="EditUser({{$user->id}});" data-toggle='modal' data-target="#EditUserModal" class="btn bg-success text-white btn-sm">Edit</a> |
                        <a class="btn bg-warning text-white btn-sm"onclick="TrashUser({{$user->id}});">Trashed</a> |
                        <a class="btn bg-danger text-light btn-sm" onclick="DestroyUser({{$user->id}});" >Delete</a>
                    </td>
                    
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="9" class="text-center"><strong>No, User Found</strong></td>
                </tr>
                @endif
                
            </tbody>
        </table>