@extends('layouts.app1')
@section('title','edit-Vcategory')
@section('content')
<!-- Begin Franchise Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Edit Vcategory</h1>
        <a  href="{{ route('vcategory.show') }}"  class=" float-right d-sm-inline-block btn btn-sm bg-warning shadow-sm text-white"><i
        class="fas fa-eye fa-sm text-success "></i> Show Vcategories </a>
    </div>
    
    <form action="{{ route('vcategory.update',$editvcategory['id']) }}" method="POST" >
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

            <div class="form-group">
                <label for="inputAddress" class="text-color-black">Name</label>
                <input type="text"  class="form-control" name="name" placeholder="Enter Name " value="{{$editvcategory['name']}}">
                <span  class="text-danger">{{$errors->first('name')}}</span>
            </div>

             
        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn bg-success btn-sm rounded-0 text-white">Update Vehicle</button>
        </div>
    </form>
    
</div>
@endsection