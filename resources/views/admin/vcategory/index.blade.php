@extends('layouts.app1')
@section('title','Vcategory-listing')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Vcategory Listing</h1>
        <a href="{{ route('vcategory.create') }}" class=" float-right d-sm-inline-block btn btn-sm bg-success shadow-sm text-white"><i
        class="fas fa-plus fa-sm text-warning "></i> Add Vcategory </a>
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
                    <th>Name</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($vcategories) && $vcategories->count() > 0)
                @foreach($vcategories as $key=> $vcategory)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$vcategory->name}}</td>
                    <td>{{\Carbon\Carbon::parse($vcategory->updated_at)->diffForHumans()}}</td>
                    <td class="d-flex d-inline">
                        <a  href="{{ route('vcategory.edit',$vcategory->id) }}" class="btn bg-success text-white btn-sm">Edit</a> |
                        <a class="btn bg-danger text-light btn-sm" href="{{ route('vcategory.destroy',$vcategory->id) }}" >Delete</a>
                    </td>
                    
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="9" class="text-center"><strong>No,Vcategory Found</strong></td>
                </tr>
                @endif
                
            </tbody>
        </table>
     </div>
    </div>




@endsection