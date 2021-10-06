        <div id="success"></div>
       <table class="table   table-striped   " >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
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
                        <a class="btn bg-warning text-white btn-sm"onclick="RestoreUser({{$user->id}});">Restore</a> 
                    </td>
                    
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="9" class="text-center"><strong>No,Trashed User Found</strong></td>
                </tr>
                @endif
                
            </tbody>
        </table>