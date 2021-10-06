@extends('layouts.app1')
@section('content')
<!-- Begin Franchise Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-color-black">Detail Tour&Travels Vehicles</h1>
        <a  href="{{ route('tourtravel.show') }}"  class=" float-right d-sm-inline-block btn btn-sm bg-warning shadow-sm text-dark"><i
        class="fas fa-eye fa-sm text-success "></i> Go Back </a>
    </div>

      {{-- Display Property Overview and Description start --}}
    <section class="mt-5 ">
      <div class="row">
        
        <div class="col-md-12 col-12">
          <div class="card">
            <div class="card-header">
              
              <h5 class="float-left">{{$tourtraveldetail->fname}} {{$tourtraveldetail->lname}} Tour&Travel Planning</h5>
              <div class="float-right"><strong class="mr-2 text_blue">Last Updated:</strong>{{\Carbon\Carbon::parse($tourtraveldetail->updated_at)->diffForHumans()}}</div>
              
            </div>
            <div class="card-body  ">
              <h5 class="font-weight-bold">Overview</h5>
              <div class="table-responsive">
              <table class="table table-striped">
                <tbody class="preview">
                  <tr>
                    <td><i class="fa fa-user pr-2"></i> First Name: </td>
                    <td><strong>{{$tourtraveldetail->fname}}</strong></td>
                    <td><i class="fa fa-user pr-2"></i> Last Name: </td>
                    <td><strong>{{$tourtraveldetail->lname}}</strong></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-envelope pr-2"></i> Email: </td>
                    <td><strong>{{$tourtraveldetail->email}}</strong></td>
                    <td><i class="fa fa-phone pr-2"></i> Phone: </td>
                    <td><strong>{{$tourtraveldetail->phone}}</strong></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-calendar pr-2"></i> Departure Date: </td>
                    <td><strong>{{$tourtraveldetail->depdate}}</strong></td>
                    <td><i class="fa fa-clock pr-2"></i> Departure Time: </td>
                    <td><strong>{{$tourtraveldetail->deptime}}</strong></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-calendar pr-2"></i> Arrival Date: </td>
                    <td><strong>{{$tourtraveldetail->arrivaldate}}</strong></td>
                    <td><i class="fa fa-clock pr-2"></i> Arrival Time: </td>
                    <td><strong>{{$tourtraveldetail->arrivaltime}}</strong></td>
                  </tr>
                  <tr>
                    <td><i class="fa fa-users pr-2"></i> Passengers: </td>
                    <td><strong>{{$tourtraveldetail->passengers}}</strong></td>
                    <td><i class="fa fa-building pr-2"></i> Destination: </td>
                    <td><strong>{{$tourtraveldetail->destination}}</strong></td>
                  </tr>
                </tbody>
              </table>
              <div>

          </div>
        </div>
      </div>
     
    </section>
    {{-- Display Property View and Description end --}}
    
   
    
</div>
@endsection

@section('scripts')

 

@endsection