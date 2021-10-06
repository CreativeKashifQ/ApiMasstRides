@extends('layouts.app1')
@section('title','roles-listing')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Trashed Users Listing</h1>
    </div>
    
    <div class="table-responsive">
     <div id="trashed-users-listing">
        @include('admin.users.trashedcreate') 
     </div>
    </div>
</div>
</div>
</div>


@endsection

@section('scripts')
    <script>
      $(function(){
        $.ajax({
          'url': '{{ route('trashed.create') }}',
          'type': 'GET',
          success:function(data)
          {
            $('#trashed-users-listing').html(data);
          },
          error:function(error)
          {
            console.log(error);
          }
        });
      });

      //Restore Role
       function RestoreUser(id){
        $.ajax({
          url: '{{ route('users.restore') }}',
          type: 'POST',
          data:{
            '_token':'{{csrf_token()}}',
            id : id,
          },
          success:function(response){
             $.ajax({
                'url':'{{ route('trashed.create') }}',
                'type':'GET',
                success:function(data)
                {
                    $('#trashed-users-listing').html(data);
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