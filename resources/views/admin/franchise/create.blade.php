@extends('layouts.app1')
@section('content')
    <!-- Begin Franchise Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-flex justify-content-end d-inline-block">
            <a href="{{ route('franchise.show') }}" class=" mr-2  btn btn-sm bg-green shadow-sm text-white"><i
                    class="fas fa-eye fa-sm text-success "></i> Show Franchise </a>
        </div>

        <form action="{{ route('franchise.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row mt-5">
                <div class="col-md-6 offset-md-3 card">
                    <div class="pt-3">
                        @include('partials/alerts')
                    </div>

                    <h4 class=" mb-0 text-center p-3 text-green font-weight-bold">Add Franchise</h4>
                    {{-- name --}}
                    <div class="form-group">
                        <label for="inputAddress" class="text-color-black">Franchise Name</label>
                        <input type="text" class="form-control {{$errors->first('name') ? 'is-invalid ' : ''}}" value="{{old('name')}}" name="name" placeholder="Chock Kumhara Franchise">
                        <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                    </div>

                    {{-- cnic --}}
                    <div class="form-group">
                        <label for="inputAddress" class="text-color-black">CNIC</label>
                        <input type="text" maxlength="13"  class="form-control {{$errors->first('cnic') ? 'is-invalid ' : ''}}" value="{{old('cnic')}}" name="cnic" placeholder="3660221362345">
                        <span class="invalid-feedback">{{ $errors->first('cnic') }}</span>
                    </div>
                    {{-- phone --}}
                    <div class="form-group">
                        <label for="inputAddress" class="text-color-black">Phone</label>
                        <input type="text" maxlength="11" class="form-control {{$errors->first('phone') ? 'is-invalid ' : ''}}" value="{{old('phone')}}" name="phone" placeholder="03013345789">
                        <span class="invalid-feedback">{{ $errors->first('phone') }}</span>
                    </div>
                    {{-- Shop Address --}}
                    <div class="form-group">
                        <label for="inputAddress" class="text-color-black">Shop Address</label>
                        <input type="text" class="form-control {{$errors->first('address') ? 'is-invalid ' : ''}}" value="{{old('address')}}" name="address" placeholder="Chock Kumharan Wala">
                        <span class="invalid-feedback">{{ $errors->first('address') }}</span>
                    </div>
                    {{-- City --}}
                    <div class="form-group">
                        <label for="inputAddress" class="text-color-black">City</label>
                        <input type="text" class="form-control {{$errors->first('city') ? 'is-invalid ' : ''}}" value="{{old('city')}}" name="city" placeholder="Multan">
                        <span class="invalid-feedback">{{ $errors->first('city') }}</span>
                    </div>
                    {{-- days --}}
                    <div class="form-group">
                        <label for="inputAddress" class="text-color-black">Subscription Days</label>
                        <input type="number" class="form-control {{$errors->first('subscription_days') ? 'is-invalid ' : ''}}" value="{{old('subscription_days')}}" name="subscription_days" placeholder="90">
                        <span class="invalid-feedback">{{ $errors->first('subscription_days') }}</span>
                    </div>
                     {{-- Paid amount --}}
                     <div class="form-group">
                        <label for="inputAddress" class="text-color-black">Payed Amount</label>
                        <input type="text" class="form-control {{$errors->first('paid_amount') ? 'is-invalid ' : ''}}" value="{{old('paid_amount')}}" name="paid_amount" placeholder="50000">
                        <span class="invalid-feedback">{{ $errors->first('paid_amount') }}</span>
                    </div>
                    {{-- Submitted by --}}
                    <div class="form-group">
                        <label for="inputAddress" class="text-color-black">Payment Mothod Name</label>
                        <input type="text" class="form-control {{$errors->first('paid_by') ? 'is-invalid ' : ''}}" value="{{old('paid_by')}}" name="paid_by" placeholder="Mobicash">
                        <span class="invalid-feedback">{{ $errors->first('paid_by') }}</span>
                    </div>
                    {{-- transactionId --}}
                    <div class="form-group">
                        <label for="inputAddress" class="text-color-black">Transaction ID</label>
                        <input type="text" class="form-control {{$errors->first('transaction_id') ? 'is-invalid ' : ''}}" value="{{old('transaction_id')}}" name="transaction_id" placeholder="Transaction ID">
                        <span class="invalid-feedback">{{ $errors->first('transaction_id') }}</span>
                    </div>
                    {{-- Transaction Slip --}}
                    <div class="form-group">
                        <label for="inputAddress" class="text-color-black">Upload Transaction Slip</label>
                        <input type="file" class="form-control {{$errors->first('transaction_slip') ? 'is-invalid ' : ''}}" value="{{old('transaction_slip')}}" name="transaction_slip">
                        <span class="invalid-feedback">{{ $errors->first('transaction_slip') }}</span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn bg-green btn-sm rounded-0 text-white float-right ">Add
                            Franchise</button>
                    </div>
                </div>
            </div>



        </form>

    </div>
@endsection
