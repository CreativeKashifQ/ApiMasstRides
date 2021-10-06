<div>

    <livewire:components.admin.weight.create-courier-weight/>
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
                <input type="text" class="form-control rounded-0" placeholder="Search Courier Weight....."  wire:model="search"/>
            </div>

                </div>
               </div>

          <table class="table table-striped   " >
               <thead class='bg-success text-white'>
                   <tr>
                       <th>#</th>
                       <th>Sending City</th>
                       <th>Receiving City</th>
                       <th>Weight</th>
                       <th>Price</th>
                       <th>Updated</th>
                       <th>Actions</th>
                   </tr>
               </thead>
               <tbody>

                   @if(isset($couriers  ) && $couriers->count() > 0)
                   @foreach($couriers as $key=> $courier)
                   <tr>

                       <td>{{++$key}}</td>
                       <td>
                           @foreach($franchises as $franchise)
                           @if($franchise->id == $courier->ofranchise_id){{$franchise->name}}@endif
                            @endforeach
                        </td>
                        <td>
                            @foreach($franchises as $franchise)
                            @if($franchise->id == $courier->dfranchise_id){{$franchise->name}}@endif
                             @endforeach
                         </td>
                       <td>{{$courier->weight}}</td>
                       <td>{{$courier->price}}</td>
                       <td>{{\Carbon\Carbon::parse($courier->updated_at)->diffForHumans()}}</td>
                       <td class="d-flex d-inline">
                        <livewire:components.admin.weight.update-courier-weight :key="uniqid()" :courierId="$courier->id"/> |
                        <livewire:components.admin.weight.delete-courier-weight :key="uniqid()" :courierId="$courier->id"/>
                       </td>
                   </tr>
                   @endforeach
                   @else
                   <tr>
                       <td colspan="8" class="text-center"><strong>No,Records Found...</strong></td>
                   </tr>
                   @endif

               </tbody>

           </table>

        </div>

        {{$couriers->links('pagination-links')}}
    </div>
    </div>






