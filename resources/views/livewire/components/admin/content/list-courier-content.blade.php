<div>

    <livewire:components.admin.content.create-courier-content/>
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
                <input type="text" class="form-control rounded-0" placeholder="Search Courir Content....."  wire:model="search"/>
            </div>

                </div>
               </div>

          <table class="table table-striped   " >
               <thead class='bg-success text-white'>
                   <tr>
                       <th>#</th>
                       <th>Content Name</th>
                       <th>Price</th>
                       <th>Updated</th>
                       <th>Actions</th>
                   </tr>
               </thead>
               <tbody>

                   @if(isset($couriercontents  ) && $couriercontents->count() > 0)
                   @foreach($couriercontents as $key=> $couriercontent)

                   <tr>
                       <td>{{++$key}}</td>
                       <td>{{$couriercontent->name}}</td>
                       <td>{{$couriercontent->price}}</td>

                       <td>{{\Carbon\Carbon::parse($couriercontent->updated_at)->diffForHumans()}}</td>
                       <td class="d-flex d-inline">

                        <livewire:components.admin.content.update-courier-content :key="uniqid()" :couriercontentId="$couriercontent->id"/> |
                        <livewire:components.admin.content.delete-courier-content :key="uniqid()" :couriercontentId="$couriercontent->id"/>
                       </td>

                   </tr>
                   @endforeach
                   @else
                   <tr>
                       <td colspan="5" class="text-center"><strong>No,Records Found...</strong></td>
                   </tr>
                   @endif

               </tbody>

           </table>

        </div>

        {{$couriercontents->links('pagination-links')}}
    </div>
    </div>






