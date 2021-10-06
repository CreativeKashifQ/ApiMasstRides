<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Invoice</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body >
    <h2 class="text-center text-success">Booking Invoice</h2>
    <div class="card">
        <div class="card-header">Booking Information</div>
    </div>
        @php
            $services_ids = json_decode($booking->service_id);
            $products_ids = json_decode($booking->product_id);
            $mechanics_ids = json_decode($booking->mechanic_id);

                     $totalservicesprice = 0;
                      $totalproductsprice = 0;
                      foreach($products as $product){
                           if(in_array($product->id, $products_ids)){
                           $totalproductsprice += $product->price;
                           }
                      }
                      foreach($services as $service){
                           if(in_array($service->id, $services_ids)){
                           $totalservicesprice += $service->price;
                           }
                      }

                      $total = $totalproductsprice + $totalservicesprice;

        @endphp
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
              <tr>
                <td><b>Customer Name</b></td>
                <td><b>Vehicle Name</b></td>
                <td><b>Services Avail</b></td>
                <td><b>Products Used</b></td>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>
                    @foreach($customers as $customer)
                    @if($customer->id == $booking->customer_id) {{$customer->name}} @endif
                    @endforeach
                </td>
                <td>
                    @foreach($workshopvehicles as $workshopvehicle)
                    @if($workshopvehicle->id == $booking->workshopvehicle_id) {{$workshopvehicle->vname}} @endif
                    @endforeach </td>
                <td>
                    @foreach($services as $service)
                    {{collect($service->id)->contains($services_ids)}} {{$service->name}}(<b>{{$service->price}} Rs.</b>),
                    @endforeach
                </td>
                <td>
                    @foreach($products as $product)
                    {{collect($product->id)->contains($products_ids)}} {{$product->name}}(<b>{{$product->price}} Rs.</b>),
                    @endforeach
                </td>
              </tr>
              </tbody>
            </table>


            <table class="table table-bordered">
                <thead>
                  <tr>
                    <td><b>Mechanic Name</b></td>
                    <td><b>Phone</b></td>
                    <td><b>Location</b></td>
                    <td><b>Booking Time</b></td>
                    <td><b>Total Amount</b></td>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>
                    @foreach($mechanics as $mechanic)
                    {{collect($mechanic->id)->contains($mechanics_ids)}} {{$mechanic->name}},
                    @endforeach
                    </td>
                    <td>
                        {{$booking->phone}}
                    </td>
                    <td>
                        {{$booking->location}}
                    </td>
                    <td>
                        {{$booking->updated_at}}
                    </td>
                    <td>
                        <h4>{{$total}}</h4> Rs.
                    </td>
                  </tr>
                  </tbody>
                </table>
          </body>

    </div>

</body>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>
