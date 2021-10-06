@extends('layouts.app1')
@section('content')
<!-- Begin Franchise Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Edit Company</h1>
        <div>
            <a  href="{{ route('make.index') }}"  class=" float-right d-sm-inline-block btn btn-sm bg-warning shadow-sm  text-dark"><i
                class="fas fa-eye fa-sm text-success "></i> Show Companies </a>
        </div>
    </div>

    <form action="{{ route('make.update',$editcompany->id) }}" method="POST" enctype="multipart/form-data">
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

            @if(session('error'))
            <div class="aler alert-error">
                {{session('error')}}
            </div>
            @endif

        <div class="row">

            <div class="form-group col-md-12 col-12">
                <label for="inputAddress" class="text-color-black">Company Name</label>
                <input type="text"  class="form-control" name="name" placeholder="eg. Toyota " value="{{old('name',$editcompany->name)}}">
                <span  class="text-danger">{{$errors->first('name')}}</span>
            </div>
        </div>

        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn bg-success btn-sm rounded-0 text-white">Update Company</button>
        </div>
    </form>

</div>
@endsection
