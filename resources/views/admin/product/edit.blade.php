@extends('layouts.app1')
@section('content')
<!-- Begin Franchise Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Edit Product</h1>
        <a  href="{{ route('product.index') }}"  class="  btn btn-sm bg-success shadow-sm text-white"><i
            class="fas fa-plus fa-sm text-white "></i> Show Workhop Products </a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td>
                        <a  href="{{ route('booking.create') }}"  class="  btn btn-sm bg-dark shadow-sm text-white"><i
                        class="fas fa-plus fa-sm text-success "></i> Booking Create </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <form action="{{ route('product.update',$editproduct->id) }}" method="POST" enctype="multipart/form-data" >
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
            <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-header">
                    <strong>Edit Product</strong>
                </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Product Name</label>
                              <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{old('name',$editproduct->name)}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('name')}}</span>
                          </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Product Price</label>
                              <input type="number" name="price" class="form-control" placeholder="Product Price Rs." value="{{old('price',$editproduct->price)}}">
                              <span class="text-danger font-weight-bold">{{$errors->first('price')}}</span>
                          </div>
                    </div>
                </div>

                </div>

            </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn bg-success btn-sm rounded-0 text-white">Update Product</button>
        </div>
    </form>

</div>
@endsection


