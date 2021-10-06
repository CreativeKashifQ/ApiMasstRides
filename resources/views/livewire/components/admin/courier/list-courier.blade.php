<div>
    <livewire:components.admin.courier.create-courier/>
    <div class='card-body'>
        @if(Session::has('success'))
        <br/>
           <div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Success ! </strong> {{Session::get('success')}}
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
           </div>
           @endif
           <div class="mt-2 mb-2 pl-1 w-100">
            <div class="row">
         <div class="col-md-4 col-12">
            <input type="text" class="form-control rounded-0" placeholder="Search Courier....." wire:model='search' />
        </div>
        <div class='col-md-8 col-12'>

        </div>
            </div>
           </div>


    <div class="table-responsive ">
          <table class="table table-sm   " >
               <thead class='bg-success text-white'>
                   <tr style="font-size:14px;">
                       <th>#</th>
                       <th>Tracking-NO</th>
                       <th>R-Name</th>
                       <th>R-Phone</th>
                       <th>R-Address</th>
                       <th>R-Email</th>
                       <th>CourierType</th>
                       <th>CourierContent</th>
                       <th>Courierweight</th>
                       <th>Courierpieces</th>
                       <th>Ofranchise-Name</th>
                       <th>Dfranchise-Name</th>
                       <th>S-Name</th>
                       <th>S-Phone</th>
                       <th>S-Address</th>
                       <th>S-Email</th>
                       <th>Kg-Price</th>
                       <th>Locatin For Destination</th>
                       <th>Discount</th>
                       <th>TotalPrice</th>
                       <th>Updated</th>
                       <th>Actions</th>


                   </tr>
               </thead>
               <tbody>

                   @if(isset($couriers  ) && $couriers->count() > 0)
                   @foreach($couriers as $key=> $courier)
                   <tr style="font-size:12px;">
                    <td>{{++$key}}</td>
                    <td>{{$courier->tracking_no}}</td>
                    <td>{{$courier->recipient_name}}</td>
                    <td>{{$courier->recipient_phone}}</td>
                    <td>{{$courier->recipient_address}}</td>
                    <td>{{$courier->recipient_email}}</td>
                            {{-- couriertype --}}
                    @forelse ($couriertypes  as $couriertype )
                    <td>@if($couriertype->id == $courier->couriertypeId){{$couriertype->name}} ({{$couriertype->price}})@endif</td>
                    @empty
                        <td>couriertype not found.</td>
                    @endforelse
                    {{-- courier content --}}
                    @forelse ($couriercontents  as $couriercontent )
                    <td>@if($couriercontent->id == $courier->couriercontentId){{$couriercontent->name}} ({{$couriercontent->price}})@endif</td>
                    @empty
                        <td>couriercontent not found.</td>
                    @endforelse
                    <td>{{$courier->Courierweight}} Kg</td>
                    <td>{{$courier->Courierpieces}}</td>
                        {{-- Origin franchise name --}}
                    <td> @foreach ($franchises   as $franchise )@if($franchise->id == $courier->OfranchiseId){{$franchise->name}}@endif @endforeach</td>
                    {{-- destination franchise name --}}
                    <td>@foreach ($franchises   as $franchise )@if($franchise->id == $courier->OfranchiseId){{$franchise->name}}@endif @endforeach</td>

                    <td>{{$courier->sender_name}}</td>
                    <td>{{$courier->sender_phone}}</td>
                    <td>{{$courier->sender_address}}</td>
                    <td>{{$courier->sender_email}}</td>
                    <td>Kg Price</td>
                    <td>{{$courier->DfranchiseLocationCourierKgPrice}}</td>
                    <td>{{$courier->discount}}</td>
                    <td>{{$courier->TotalAmount}}</td>
                    <td>{{\Carbon\Carbon::parse($courier->updated_at)->diffForHumans()}}</td>
                    <td class="d-flex d-inline">
                        @if($courier->status == 0)
                     <livewire:components.admin.courier.pending-courier :key="uniqid()" :courierId="$courier->id"/> |
                         @else
                     <livewire:components.admin.courier.complete-courier :key="uniqid()" :courierId="$courier->id"/> |
                         @endif
                     <livewire:components.admin.courier.update-courier :key="uniqid()" :courierId="$courier->id"/> |
                     <livewire:components.admin.courier.delete-courier :key="uniqid()" :courierId="$courier->id"/>
                    </td>


                    </tr>

                   @endforeach
                   @else
                   <tr>
                       <td colspan="23" class="text-center"><strong>No,Records Found...</strong></td>
                   </tr>
                   @endif

               </tbody>

           </table>

        </div>

        {{$couriers->links('pagination-links')}}
    </div>


    </div>


