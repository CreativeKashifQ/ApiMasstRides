<div>

    <livewire:components.admin.couriertype.create-courier-type/>
    <div class='card-body'>
    <div class="table-responsive">
            @if(Session::has('success'))
            <br/>
               <div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Success ! </strong> {{Session::get('success')}}
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
               </div>
               @endif
               <div class="mt-2 mb-2 pl-1 w-50">
                <div class="row">
             <div class="col-md-6 col-10">
                <input type="text" class="form-control rounded-0" placeholder="Search CourierType....."  wire:model="search"/>
            </div>

                </div>
               </div>

          <table class="table table-striped   " >
               <thead class='bg-success text-white'>
                   <tr>
                       <th>#</th>
                       <th>Name</th>
                       <th>Price</th>
                       <th>Updated</th>
                       <th>Actions</th>
                   </tr>
               </thead>
               <tbody>

                   @if(isset($couriertypes  ) && $couriertypes->count() > 0)
                   @foreach($couriertypes as $key=> $couriertype)

                   <tr>
                       <td>{{++$key}}</td>
                       <td>{{$couriertype->name}}</td>
                       <td>{{$couriertype->price}}</td>

                       <td>{{\Carbon\Carbon::parse($couriertype->updated_at)->diffForHumans()}}</td>
                       <td class="d-flex d-inline">

                        <livewire:components.admin.couriertype.update-courier-type :key="uniqid()" :couriertypeId="$couriertype->id"/> |
                        <livewire:components.admin.couriertype.delete-courier-type :key="uniqid()" :couriertypeId="$couriertype->id"/>
                       </td>

                   </tr>
                   @endforeach
                   @else
                   <tr>
                       <td colspan="17" class="text-center"><strong>No,Records Found...</strong></td>
                   </tr>
                   @endif

               </tbody>

           </table>

        </div>

        {{$couriertypes->links('pagination-links')}}
    </div>
    </div>






