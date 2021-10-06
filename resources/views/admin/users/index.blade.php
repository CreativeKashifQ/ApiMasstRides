@extends('layouts.app1')
@section('title','roles-listing')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Users Listing</h1>
        <a data-toggle='modal' data-target="#AddUserModal"  class=" float-right d-sm-inline-block btn btn-sm bg-success shadow-sm text-white"><i
        class="fas fa-plus fa-sm text-warning "></i> Add User </a>
    </div>

    <div class="table-responsive">
     <div id="users-listing">
        @include('admin.users.create')
     </div>
    </div>
</div>

<!-- Add Role Modal -->
<div class="modal fade" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog " role="document">
<div class="modal-content bg-color-sky">
    <div class="modal-header">
        <h5 class="modal-title text-color-black" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="AddUserForm">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label for="inputAddress" class="text-color-black">Name</label>
                <input type="text" title="Enter name of the user eg. Taswar Naqvi" class="form-control" id="name" placeholder="Enter Name">
                <span id="nameError" class="text-danger"></span>
            </div>

            <div class="form-group">
                <label for="inputAddress" class="text-color-black">Email</label>
                <input type="email" title="Enter Email eg. abc@gmail.com" class="form-control" id="email" placeholder="Enter Email">
                <span id="emailError" class="text-danger"></span>
            </div>

            <div class="form-group">
                <label for="inputAddress" class="text-color-black">Select Role</label>
                <select class="js-role-user-multiple" name="states[]" id="roles" multiple="multiple">
                  @foreach($roles as $role)
                  <option value="{{$role->id}}">{{$role->name}}</option>
                  @endforeach
                </select>
                <span id="emailError" class="text-danger"></span>
            </div>
            {{-- <div>
                <input type="text" id="franchisesValue" />
                <input type="text" id="franchisesValue" />
                <input type="text" id="franchisesValue" />
                <input type="text" id="franchisesValue" />
                <input type="text" id="franchisesValue" />
                <input type="text" id="franchisesValue" />
                <input type="text" id="franchisesValue" />
                <input type="text" id="franchisesValue" />
                <input type="text" id="franchisesValue" />
                <input type="text" id="franchisesValue" />
                <input type="text" id="franchisesValue" />
                <input type="text" id="franchisesValue" />
            </div> --}}
            <div class="form-group border border-dark ">
                <label for="inputAddress" class="text-color-black pl-3">Select Permissoins</label>
                <div class="row pl-3">
                    <div class="col-md-4 col-4">
                        <div class="form-group d-flex d-inline">
                        <label>Franchise :</label>
                        <input type="checkbox" name="franchises" id="franchises" class="mt-2" >
                        </div>
                    </div>
                    <div class="col-md-4 col-4">
                        <div class="form-group d-flex d-inline">
                            <label>Customers :</label>
                            <input type="checkbox" name="customers" id="customers" class="mt-2" >
                            </div>
                    </div>
                    <div class="col-md-4 col-4">
                        <div class="form-group d-flex d-inline">
                        <label>Vehicles :</label>
                        <input type="checkbox" name="vehicles" id="vehicles" class="mt-2" >
                        </div>
                    </div>
                </div>

                <div class="row pl-3">
                    <div class="col-md-4 col-4 d-flex d-inline">
                        <div class="form-group">
                        <label>Roles :</label>
                        <input type="checkbox" name="roles" class="mt-2" >
                        </div>
                    </div>
                    <div class="col-md-4 col-4 d-flex d-inline">
                        <div class="form-group">
                            <label>Users :</label>
                            <input type="checkbox" name="users" class="mt-2" >
                            </div>
                    </div>

                </div>


                <div class="row pl-3">
                    <div class="col-md-4 col-4">
                        <div class="form-group">
                        <label>Bookings :</label>
                        <input type="checkbox" name="bookings" >
                        </div>
                    </div>
                    <div class="col-md-4 col-4">
                        <div class="form-group">
                            <label>Drivers :</label>
                            <input type="checkbox" name="drivers" >
                            </div>
                    </div>
                    <div class="col-md-4 col-4">
                        <label>Employees :</label>
                        <input type="checkbox" name="employees" >
                    </div>
                </div>

                <div class="row pl-3">
                    <div class="col-md-4 col-4">
                        <div class="form-group d-flex d-inline">
                        <label>Goods & Transport :</label>
                        <input type="checkbox" name="goods_and_transport" class="mt-2" >
                        </div>
                    </div>
                    <div class="col-md-4 col-4">
                        <div class="form-group">
                            <label>Tours & Trevels :</label>
                            <input type="checkbox" name="tours_and_travels" >
                            </div>
                        </div>
                    <div class="col-md-4 col-4 ">
                        <div class="form-group d-flex d-inline">
                        <label>Vehilce Management :</label>
                        <input type="checkbox" name="vehicle_menagement" class="mt-2 mr-2" >
                        </div>
                    </div>
                </div>

                <div class="row pl-3">
                    <div class="col-md-4 col-4">
                        <div class="form-group d-flex d-inline">
                        <label>Workshop On Wheels :</label>
                        <input type="checkbox" name="workshop_on_wheels" class='mt-2' >
                        </div>
                    </div>
                    <div class="col-md-4 col-4">
                        <div class="form-group">
                            <label>Reports :</label>
                            <input type="checkbox" name="reports" >
                            </div>
                    </div>
                    <div class="col-md-4 col-4">
                        <label>Admin :</label>
                        <input type="checkbox" name="admin" >
                    </div>
                </div>
                <span id="permissionError" class="text-danger"></span>
            </div>

             <div class="form-group">
                <label for="inputAddress" class="text-color-black">Password</label>
                <input type="password" title="Enter Passwrod *******" class="form-control" name="password" id="password" placeholder="Enter Email">
                <span id="passwordError" class="text-danger"></span>
            </div>

             <div class="form-group">
                <label for="inputAddress" class="text-color-black">Confirm Password</label>
                <input type="password" title="Enter Confirm Passord" class="form-control" name="password_confirmation" id="password-confirm" placeholder="Confirm Password">
                <span id="ConfirmError" class="text-danger"></span>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn bg-secondary text-light btn-sm rounded-0" data-dismiss="modal">Close</button>
            <button type="submit"  class="btn bg-success btn-sm rounded-0 text-white">Submit</button>
        </div>
    </form>
</div>
</div>
</div>

<!-- Edit Role Modal -->
<div class="modal fade" id="EditUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog " role="document">
  <form id="UpdateUserForm">
        @csrf
<div class="modal-content bg-color-sky">
    <div class="modal-header">
        <h5 class="modal-title text-color-black" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
        <div class="modal-body">
         <div id="edituser">
           @include('admin.users.edit')
         </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn bg-secondary text-light btn-sm rounded-0" data-dismiss="modal">Close</button>
            <button type="submit"  class="btn bg-success btn-sm rounded-0 text-white">Update</button>
        </div>
    </form>
</div>


</div>
</div>
@endsection

@section('scripts')
    <!--SLIDER 2 CDN LINKS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
      $(document).ready(function() {
    $('.js-role-user-multiple').select2({ width: '100%' });
    });
    </script>
    <script>
        //Page Load Ajax Request
        $(function(){
            $.ajax({
                'url':'{{ route('users.create') }}',
                'type':'GET',
                success:function(data)
                {
                    $('#users-listing').html(data);
                },
                error:function(error)
                {
                    console.log(error);
                }
            });
        });

        //Getting Permissoins Values
        $('#franchises').on('change',function(){
            $val = $('#franchises').prop("checked") ? true : false ;
            $('#franchisesValue').val($val);
        });

        //Add User
        $(function(){
            $('#AddUserForm').on('submit',function(e){
                e.preventDefault();
                 $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':'{{csrf_token()}}',
                }
                });
                var name = $('#name').val();
                var email = $('#email').val();
                var roles = $('#roles').val();
                var password = $('#password').val();
                var confirm_password = $('#password-confirm').val();
                var franchisesValue = $('#franchisesValue').val();


                var formdata = new FormData();
                formdata.append('name',name);
                formdata.append('email',email);
                formdata.append('roles',roles);
                formdata.append('password',password);
                formdata.append('password_confirmation',confirm_password);
                form.append('franchisesValue',franchisesValue);

            $.ajax({
                'url':'{{ route('users.store') }}',
                'type': 'POST',
                 data: formdata,
                 contentType:false,
                 processData:false,
                success:function(response){

                $.ajax({
                    'url':'{{ route('users.create') }}',
                    'type':'GET',
                    success:function(data)
                    {
                        $('#users-listing').html(data);
                        $('#AddUserModal').modal('hide');
                        $('#success').html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong> Success! </strong>`+response+`
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>`);
                    },
                    error:function(error)
                    {
                        console.log(error);
                    }
                });

                },
                error:function(error)
                {
                    $('#nameError').html(error.responseJSON.errors.name);
                    $('#emailError').html(error.responseJSON.errors.email);
                    $('#passwordError').html(error.responseJSON.errors.password);
                }
            });

            });
        });

        //Edit Role From Edit Model
    function EditUser(id){

        $.ajax({
          url: '{{ route('users.edit') }}',
          type: 'POST',
          data:{
            '_token':'{{csrf_token()}}',
            id : id,
          },
          success:function(data){
              console.log(data);
              $('#edituser').html(data);
          },
          error:function(error){
            alert(error.responseJSON.errors);
          }

        });
    }

    //Update User From Model values
    $(function(){
       $('#UpdateUserForm').on('submit',function(e){
          e.preventDefault();
            $.ajaxSetup({
                headers:{
                  'X-CSRF-TOKEN':"{{csrf_token()}}"
                }
              });
          var id = $("#editid").val();
          var name = $("#editname").val();
          var email = $("#editemail").val();
          var roles = $("#roleids").val();
          var franchisesValue = $('#franchisesValue').val();

          var form = new FormData();
          form.append('id',id);
          form.append('name',name);
          form.append('email',email);
          form.append('roles',roles);
          form.append('franchisesValue',franchisesValue);

          $.ajax({
            url:'{{ route('users.update') }}',
            type:'POST',
            data:form,
            contentType:false,
            processData:false,
            success:function(response){
              if(response){
              $.ajax({
              url :'{{ route('users.create') }}',
              type : 'GET',
              success:function(data){
                $('#users-listing').html(data);
                 $('#success').empty().html('<div class="alert alert-success">'+response+'</div>').fadeOut(5000);
              },
              error:function(error){
                console.log(error);
              }
            });
            $("#EditUserModal").modal('hide');
              }
            },
            error:function(error){
              console.log(error);
            }
          });
       });
    });

         //Trashed Role From Role List
    function TrashUser(id){
        $.ajax({
          url: '{{ route('users.trash') }}',
          type: 'POST',
          data:{
            '_token':'{{csrf_token()}}',
            id : id,
          },
          success:function(response){
             $.ajax({
                'url':'{{ route('users.create') }}',
                'type':'GET',
                success:function(data)
                {

                    $('#users-listing').html(data);
                    $('#success').html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong> Success! </strong>`+response+`
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>`).fadeOut(10000);
                },
                error:function(error)
                {
                    console.log(error);
                }
            });
          },
          error:function(error){
            alert(error.responseJSON.errors);
          }

        });
    }


      //DeleteTrashedRole Role
       function DestroyUser(id){
        $.ajax({
          url: '{{ route('users.destroy') }}',
          type: 'POST',
          data:{
            '_token':'{{csrf_token()}}',
            id : id,
          },
          success:function(response){
             $.ajax({
                'url':'{{ route('users.create') }}',
                'type':'GET',
                success:function(data)
                {
                    $('#users-listing').html(data);
                    $('#success').html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong> Success! </strong>`+response+`
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>`).fadeOut(10000);
                },
                error:function(error)
                {
                    console.log(error);
                }
            });
          },
          error:function(error){
            alert(error.responseJSON.errors);
          }

        });
    }

    </script>
@endsection
