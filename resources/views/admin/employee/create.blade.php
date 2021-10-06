@extends('layouts.app1')
@section('content')
<!-- Begin Franchise Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Add Employee</h1>
        <a  href="{{ route('employee.show') }}"  class=" float-right d-sm-inline-block btn btn-sm bg-warning shadow-sm text-white"><i
        class="fas fa-eye fa-sm text-success "></i> Show Employees </a>
    </div>
    
    <form action="{{ route('employee.store') }}" method="POST" >
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

            <div class="form-group">
                <label for="inputAddress" class="text-color-black">Name</label>
                <input type="text"  class="form-control" name="name" placeholder="Enter Name " value="{{old('name')}}">
                <span  class="text-danger">{{$errors->first('name')}}</span>
            </div>


            <div class="form-group">
                <label for="inputAddress" class="text-color-black">Email</label>
                <input type="email"  class="form-control" name="email" placeholder="Enter Email " value="{{old('email')}}">
                <span  class="text-danger">{{$errors->first('email')}}</span>
            </div>



            <div class="form-group">
                <label for="inputAddress" class="text-color-black">Phone</label>
                <input type="phone"  class="form-control" name="phone" placeholder="Enter Phone " value="{{old('phone')}}">
                <span  class="text-danger">{{$errors->first('phone')}}</span>
            </div>


            <div class="form-group">
                <label for="inputAddress" class="text-color-black">Additional Information</label>
                <textarea class="form-control" cols="3" rows="3" name="message">{{old('message')}}</textarea>
                <span  class="text-danger">{{$errors->first('message')}}</span>
            </div>

        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn bg-success btn-sm rounded-0 text-white">Add Employee</button>
        </div>
    </form>
    
</div>
@endsection