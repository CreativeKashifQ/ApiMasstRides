@extends('layouts.app1')
@section('content')
<!-- Begin Franchise Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Edit Engine (Power)</h1>
        <div>
            <a  href="{{ route('engine.index') }}"  class=" float-right d-sm-inline-block btn btn-sm bg-warning shadow-sm  text-dark"><i
                class="fas fa-eye fa-sm text-success "></i> Show Engines(Powers) </a>
        </div>
    </div>

    <form action="{{ route('engine.update',$editengine->id) }}" method="POST" enctype="multipart/form-data">
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
                <label for="inputAddress" class="text-color-black">Engine (Power)</label>
                <input type="number"  class="form-control" name="power" placeholder="eg. 18 " value="{{old('power',$editengine->power)}}">
                <span  class="text-danger">{{$errors->first('power')}}</span>
            </div>
        </div>

        </div>
        <div class="modal-footer">
            <button type="submit"  class="btn bg-success btn-sm rounded-0 text-white">Update Engine(Power)</button>
        </div>
    </form>

</div>
@endsection
