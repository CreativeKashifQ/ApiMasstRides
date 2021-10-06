@extends('layouts.app1')
@section('title','Franchise Listing')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h5 class="mb-0 text-green font-weight-bold">Franchise Listing</h5>
        <a href="{{ route('franchise.create') }}" class=" float-right d-sm-inline-block btn btn-sm bg-green shadow-sm text-white"><i
        class="fas fa-plus fa-sm text-white "></i> Add Franchise </a>
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
       <table class="table table-striped  table-sm  " >
            <thead>
                <tr style="font-size: 13px;" class="text-green">
                    <th>#</th>
                    <th>MR Number</th>
                    <th>Franchise Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>CNIC</th>
                    <th>Shop Address</th>
                    <th>City</th>
                    <th>Subs. Days</th>
                    <th>Paid Amount</th>
                    <th>Payment Method</th>
                    <th>Transaction ID</th>
                    <th>Transaction Slip</th>
                    <th>AssignTo</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($franchises) && $franchises->count() > 0)
                @foreach($franchises as $key=> $franchise)
                <tr style="font-size:13px;">
                    <td>{{++$key}}</td>
                    <td>MR-{{$franchise->city}}-00{{$franchise->id}}</td>
                    <td>{{$franchise->name}}</td>
                    <td> @if(isset($franchise->user->email) == false)
                        <span class="badge badge-danger pb-1">Nil</span>
                         @else{{$franchise->user->email}} @endif
                    </td>
                    <td>{{$franchise->phone}}</td>
                    <td>{{$franchise->cnic}}</td>
                    <td>{{$franchise->address}}</td>
                    <td>{{$franchise->city}}</td>
                    <td>{{$franchise->subscription_days}} days</td>
                    <td>{{$franchise->paid_amount}}</td>
                    <td>{{$franchise->paid_by}}</td>
                    <td>{{$franchise->transaction_id}}</td>
                    <td><a href="{{ asset('images/uploads/transactionslips/'.$franchise->transaction_slip) }}"><img class="img-thumbnail" style="height:40px; width:100px;" src="{{ asset('images/uploads/transactionslips/'.$franchise->transaction_slip) }}"></a></td>
                    <td> @if(isset($franchise->user->name) == false)
                        <span class="badge badge-danger pb-1">Not Assign</span>
                         @else{{$franchise->user->name}} @endif
                    </td>
                    <td>{{Carbon\Carbon::parse($franchise->created_at)->diffForHumans()}}</td>
                    <td class="d-flex d-inline">
                        <a  href="{{ route('franchise.edit',$franchise->id) }}" class="btn bg-green text-white btn-sm"><i class="fa fa-pencil"></i></a> |
                        <a class="btn bg-danger text-light btn-sm" href="{{ route('franchise.destroy',$franchise->id) }}" ><i class="fa fa-trash"></i></a>
                    </td>

                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="16" class="text-center"><small>No, Franchise Found</small></td>
                </tr>
                @endif

            </tbody>
        </table>
     </div>
    </div>




@endsection
