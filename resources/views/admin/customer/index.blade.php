@extends('layouts.app1')
@section('title','roles-listing')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="mb-0 text-green font-weight-bold">Customers Listing</h5>
        <div>
            {{-- <button  href="{{ route('customer.create') }}" disabled  class=" float-right d-sm-inline-block btn btn-sm bg-green shadow-sm  text-white  "><i
                class="fas fa-plus fa-sm text-white "></i> New Customer </button> --}}
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
       <table class="table   table-striped table-sm   " >
            <thead>
                <tr style="font-size: 13px;" class="text-green">
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Created At</th>
                    {{-- <th>Actions</th> --}}
                </tr>
            </thead>
            <tbody>
                @if(isset($customers) && $customers->count() > 0)
                @foreach($customers as $key=> $customer)
                <tr style="font-size: 13px;" >
                    <td>{{++$key}}</td>
                    <td>{{$customer->name}}</td>
                    <td>{{$customer->user != null ? $customer->user->email : $customer->email}}</td>
                    <td>{{$customer->user != null ? $customer->user->phone : $customer->phone}}</td>
                    <td>{{$customer->country}}</td>
                    <td>{{$customer->state}}</td>
                    <td>{{$customer->city}}</td>
                    <td>{{Carbon\Carbon::parse($customer->created_at)->format('d M, Y')}}</td>
                    {{-- <td class="d-flex d-inline">
                        <button disabled  href="{{ route('customer.edit',$customer->id) }}" class="btn bg-green text-white btn-sm"><i class="fa fa-pencil"></i></button> |
                        <button disabled class="btn bg-danger text-light btn-sm" href="{{ route('customer.destroy',$customer->id) }}" ><i class="fa fa-trash"></i></button>
                    </td> --}}

                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="9" class="text-center"><strong>No, Customers Found</strong></td>
                </tr>
                @endif

            </tbody>
        </table>
     </div>
    </div>




@endsection
