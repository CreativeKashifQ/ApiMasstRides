@extends('layouts.app1')
@section('title','goodstransport-management')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Vehicle Expense Record</h1>

    <div>
        <a href="{{ route('vehicleexpense.create',$id) }}" class=" float-right ml-2 d-sm-inline-block btn btn-sm bg-success shadow-sm text-white"><i
        class="fas fa-plus fa-sm text-warning "></i> Add Expense </a>
        <a href="{{ route('vehiclemanagement.show') }}" class=" float-right d-sm-inline-block btn btn-sm bg-dark shadow-sm text-white"><i
        class="fas fa-eye fa-sm text-warning "></i> Vehicle Management</a>
    </div>
    
    
       
       
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
                    <th>Date</th>
                    <th>Expense type</th>
                    <th>Details</th>
                    <th>Notes</th>
                    <th>Last Update</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
                @if(isset($vehicleexpenses) && $vehicleexpenses->count() > 0)
                @foreach($vehicleexpenses as $key=> $vehicleexpense)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$vehicleexpense->date}}</td>
                    <td>
                        @foreach($vehicleexpensestype as $vehicleexpensetype)
                        @if(isset($vehicleexpense) && $vehicleexpense->expense_id == $vehicleexpensetype->id)
                        {{$vehicleexpensetype->type}}
                        @endif
                        @endforeach
                    </td>
                    <td>{{$vehicleexpense->details}}</td>
                    <td>{{$vehicleexpense->notes}}</td>
                    <td>{{\Carbon\Carbon::parse($vehicleexpense->updated_at)->diffForHumans()}}</td>
                    <td class="d-flex d-inline">
    
                        <a  href="{{ route('vehicleexpense.edit',$vehicleexpense->id) }}" class="btn bg-success text-white btn-sm">Edit</a> |
                        <a class="btn bg-danger text-light btn-sm" href="{{ route('vehicleexpense.destroy',$vehicleexpense->id) }}" >Delete</a>
                    </td>
                    
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="8" class="text-center"><strong>No,Vehicles Expenses Found</strong></td>
                </tr>
                @endif
                
            </tbody>
        </table>
    
     </div>
    </div>




@endsection