<div>
    <div class="d-flex justify-content-end ">
        @include('livewire.components.admin.user.create-user')
        @include('livewire.components.admin.user.update-user')
    </div>
    <div class="row">
        <div class="col-md-4 col-12">
            <div class="form-group">
                <input type="text" class="form-control rounded-0" wire:model='search' placeholder="Search by role" />
            </div>

        </div>
    </div>
    <table class="table  table-striped   ">
        <thead>
            <tr style="font-size: 13px;" class="text-green">
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Franchise</th>
                <th>Permissions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @if (isset($users) && $users->count() > 0)
                @foreach ($users as $key => $user)
                    @php
                        $permissions = json_decode($user->permissions);
                    @endphp
                    <tr style="font-size: 13px;" >
                        <td>{{ ++$key }}</td>
                        <td>{{ $user->customer ? $user->customer->name : $user->name }}</td>
                        <td>
                            @if ($user->customer != null)
                                {{ $user->customer->email }}
                            @endif
                            {{ $user->email }}
                        </td>
                        <td>{{ $user->roleText }}</td>
                        <td>
                            @if (isset($user->franchise->name) == false)
                                <span class="badge badge-danger pb-1">Can't assign</span>
                                @else{{ $user->franchise->name }}
                            @endif
                        </td>
                        <td>
                            @if (!$permissions == null)
                                @foreach ($permissions as $permission)
                                    {{ $permission }},
                                @endforeach
                            @else
                                <span class="badge badge-danger pb-1">Nil</span>
                            @endif
                        </td>
                        <td class="d-flex d-inline">
                            <button {{ $user->count() == 1 ? 'disabled' : '' }}
                                class="btn bg-green text-white btn-sm rounded-0" data-toggle="modal"
                                data-target="#EditUserModal" wire:click="edit({{ $user->id }})" {{$user->role == 'MASST@CUSTOMER' ? 'disabled' : ''}}>@if($user->role == 'MASST@CUSTOMER') <i class="fa fa-user"></i> @else<i class="fa fa-pencil"></i>@endif</button> |
                            <button {{ $user->count() == 1 ? 'disabled' : '' }}
                                class="btn bg-danger text-light btn-sm rounded-0"
                                wire:click="delete({{ $user->id }})">@if($user->role == 'MASST@CUSTOMER') <i class="fa fa-user"></i> @else<i class="fa fa-trash"></i>@endif</button>
                        </td>

                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="9" class="text-center"><small>No, User Found</small></td>
                </tr>
            @endif

        </tbody>
    </table>
</div>
