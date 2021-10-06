@extends('layouts.app1')
@section('content')
<!-- Begin Franchise Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Edit Driver</h1>
        <a  href="{{ route('driver.show') }}"  class=" float-right d-sm-inline-block btn btn-sm bg-warning shadow-sm text-white"><i
        class="fas fa-eye fa-sm text-success "></i> Show Drivers </a>
    </div>

    <form action="{{ route('driver.update',$editdriver['id']) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="modal-body">
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success ! </strong> {{Session::get('success')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            </div>
            @endif

            @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error ! </strong> {{Session::get('error')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            </div>
            @endif

            <div class="row">

                <div class="form-group col-md-6 col-12">
                    <label for="inputAddress" class="text-color-black">Name</label>
                    <input type="text"  class="form-control" name="name" placeholder="Enter Name " value="{{old('name',$editdriver->name)}}">
                    <span  class="text-danger">{{$errors->first('name')}}</span>
                </div>


                <div class="form-group col-md-6 col-12">
                    <label for="inputAddress" class="text-color-black">Email(Optional)</label>
                    <input type="email"  class="form-control" name="email" placeholder="Enter Email " value="{{old('email',$editdriver->email)}}">
                    <span  class="text-danger">{{$errors->first('email')}}</span>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6 col-12">
                    <label for="inputAddress" class="text-color-black">Phone</label>
                    <input type="phone"  class="form-control" name="phone" placeholder="Enter Phone " value="{{old('phone',$editdriver->phone)}}">
                    <span  class="text-danger">{{$errors->first('phone')}}</span>
                </div>


                <div class="form-group col-md-6 col-12">
                    <label for="inputAddress" class="text-color-black">Uploads Driver Images</label>
                    <input type="file" name="driver_images[]" multiple class="form-control"/>
                    <span  class="text-danger">{{$errors->first('driver_images')}}</span>
                </div>
            </div>


                <div class="card">
                    <div class="card-header">
                        <strong>Upload Driver Lisence Image</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-12 ">
                            <div class=" d-flex justify-content-center pb-3">
                                @if($editdriver->lisence_image)
                                <img id="showImage" src="{{asset('images/uploads/drivers/'.$editdriver->lisence_image)}}" style="width: 350px; height: 200px;">
                                @else
                                <img id="showImage" src="{{asset('images/driving_lisence.png')}}" alt="car image" style="width: 350px; height: 200px;">
                                @endif
                            </div>
                            <div class="custom-file d-flex justify-content-center col-md-6 col-12 mx-auto ">
                            <input type="file" class="custom-file-input-lisence" id="customFile" name="lisence_image" >
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            <span  class="text-danger">{{$errors->first('lisence_image')}}</span>
                          </div>
                        </div>

                        </div>
                    </div>
                </div>

        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn bg-success btn-sm rounded-0 text-white">Update Driver</button>
        </div>
    </form>

</div>
@endsection

@section('scripts')


<script>

     // Add the following code if you want the name of the file appear on select
     //Driving Lisence Image
     $(".custom-file-input-lisence").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

       //Image Upload View
       $('#customFile').on('change',function(e){
                var x = URL.createObjectURL(e.target.files[0]);
                $('#showImage').attr('src',x);
        });
</script>


@endsection
