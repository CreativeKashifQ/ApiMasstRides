<input type="hidden" class="form-control" value="{{@$edituser['id']}}" id="editid">
            <div class="form-group">
                <label for="inputAddress" class="text-color-black">Name</label>
                <input type="text" title="Enter name of the user eg. Taswar Naqvi" class="form-control" id="editname"  value="{{@$edituser['name']}}" placeholder="Enter Name">
                <span id="nameError" class="text-danger"></span>
            </div>

            <div class="form-group">
                <label for="inputAddress" class="text-color-black">Email</label>
                <input type="email" title="Enter Email eg. abc@gmail.com" class="form-control" value="{{@$edituser['email']}}" id="editemail" placeholder="Enter Email">
                <span id="emailError" class="text-danger"></span>
            </div>
                @if(isset($edituser))
                        @php
                        $ids = $edituser->roles->pluck('id');
                        @endphp
                        @endif
            <div class="form-group">
                <label for="inputAddress" class="text-color-black">Select Role</label>
                <select class="js-role-user-multiple form-control" name="states[]" id="roleids" multiple="multiple">
                  @foreach($roles as $role)
                  <option value="{{$role->id}}" @if(isset($ids) && $ids->contains($role->id)) {{'selected'}} @endif >{{$role->name}}</option>
                  @endforeach
                </select>
                <span id="emailError" class="text-danger"></span>
            </div>
