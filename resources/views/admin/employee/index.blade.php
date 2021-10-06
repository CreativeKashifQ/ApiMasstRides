@extends('layouts.app1')
@section('title','drivers-listing')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Employee Listing</h1>
        <a href="{{ route('driver.create') }}" class=" float-right d-sm-inline-block btn btn-sm bg-success shadow-sm text-white"><i
        class="fas fa-plus fa-sm text-warning "></i> Add Employee </a>
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
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($employees) && $employees->count() > 0)
                @foreach($employees as $key=> $employee)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->phone}}</td>
                    <td>{{$employee->message}}</td>
                    <td>{{\Carbon\Carbon::parse($employee->updated_at)->diffForHumans()}}</td>
                    <td class="d-flex d-inline">
                        <a  href="{{ route('employee.edit',$employee->id) }}" class="btn bg-success text-white btn-sm">Edit</a> |
                        <a class="btn bg-danger text-light btn-sm" href="{{ route('employee.destroy',$employee->id) }}" >Delete</a>
                    </td>
                    
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="9" class="text-center"><strong>No, Employees Found</strong></td>
                </tr>
                @endif
                
            </tbody>
        </table>
     </div>
    </div>




@endsection