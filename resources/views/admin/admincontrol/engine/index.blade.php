@extends('layouts.app1')
@section('title','Engine-listing')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Engine Power Listing</h1>
        <a href="{{ route('engine.create') }}" class=" float-right d-sm-inline-block btn btn-sm bg-success shadow-sm text-white"><i
        class="fas fa-plus fa-sm text-warning "></i> Add Engine(Power) </a>
    </div>

    <div class="table-responsive">
         @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success ! </strong> {{Session::get('success')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
            </div>
            @endif


       <table class="table   table-striped   " >
            <thead>
                <tr>
                    <th>#</th>
                    <th>Engine(power)</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($engines) && $engines->count() > 0)
                @foreach($engines as $key=> $engine)


                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$engine->power}}</td>
                    <td>{{\Carbon\Carbon::parse($engine->updated_at)->diffForHumans()}}</td>
                    <td class="d-flex d-inline">
                        <a  href="{{ route('engine.edit',$engine->id) }}" class="btn bg-success text-white btn-sm">Edit</a> |
                        <a class="btn bg-danger text-light btn-sm" href="{{ route('engine.destroy',$engine->id) }}" >Delete</a>
                    </td>

                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4" class="text-center"><strong>No, Records Found</strong></td>
                </tr>
                @endif

            </tbody>
        </table>
     </div>
    </div>




@endsection
