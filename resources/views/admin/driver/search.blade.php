<tbody >
    @if(isset($drivers) && $drivers->count() > 0)
    @foreach($drivers as $key=> $driver)
    <tr style="font-size: 13px;"  >
        <td>{{++$key}}</td>
        <td>{{$driver->name}}</td>
        <td>{{$driver->email}}</td>
        <td>{{$driver->phone}}</td>
        <td>{{$driver->country}}</td>
        <td>{{$driver->state}}</td>
        <td>{{$driver->city}}</td>
        <td>{{Carbon\Carbon::parse($driver->created_at)->format('d M, Y')}}</td>
        <td class="d-flex d-inline">
            <a href="#" class="btn btn-link btn-sm">Assign Franchise</a>

        </td>

    </tr>
    @endforeach
    @else
    <tr>
        <td colspan="9" class="text-center"><strong>No, Drivers Found</strong></td>
    </tr>
    @endif

</tbody>
