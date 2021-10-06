<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Goods & Transport Invoice</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			/* .invoice-box table tr.details td {
				padding-bottom: 20px;
			} */

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									{{-- <img src="https://www.sparksuite.com/images/logo.png" style="width: 100%; max-width: 300px" /> --}}
                                    Masst Rides
								</td>

								<td>
									Invoice #: MASST-R{{$reservation->id}}<br />
									Created: {{$reservation->created_at}}<br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
                                    <strong> Customer Information:</strong><br>
									 <small>@foreach($customers as $customer) @if($customer->id == $reservation->customer_id)
                                         Name: {{$customer->name}}<br>
                                         Email: {{$customer->email}}<br>
                                         Phone: {{$customer->phone}}<br>
                                         Address: {{$customer->address}}
                                         @endif @endforeach</small><br />
								</td>

								<td>
									Masst Rides<br />
									Khanewal Road Multan<br />
									masstrides.com
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Payment Method</td>
					<td>{{$reservation->payment_method}}</td>
				</tr>

				<tr class="details">
					<td>{{$reservation->payment_method}}</td>

					<td>Rs. {{$reservation->total_amount}}</td>
				</tr>

				<tr class="heading">
					<td>Items/Names</td>

					<td>Price/Details</td>
				</tr>

				<tr class="item">
					<td>Reservation_Type</td>

					<td>{{$reservation->reservation_type}}</td>
				</tr>

                <tr class="item">
					<td>Reservation_For</td>

					<td>{{$reservation->reservation_for}}</td>
				</tr>

                <tr class="item">
					<td>Branch Name</td>

					<td>@foreach($franchises as $franchise) @if($franchise->id == $reservation->branch) {{$franchise->name}} @endif @endforeach</td>
				</tr>
                <tr class="item">
					<td>Customer Name</td>

					<td>@foreach($customers as $customer) @if($customer->id == $reservation->customer_id) {{$customer->name}} @endif @endforeach</td>
				</tr>
                <tr class="item">
					<td>Driver Detail</td>

					<td>@foreach($drivers as $driver) @if($driver->id == $reservation->driver_id) {{$driver->name}},{{$driver->email}},{{$driver->phone}} @endif @endforeach</td>
				</tr>
                <tr class="item">
					<td>Vehilce Type</td>

					<td>{{$reservation->vehicle_type}}</td>
				</tr>
                <tr class="item">
					<td>Goods Type</td>

					<td>{{$reservation->goods_type}}</td>
				</tr>
                <tr class="item">
					<td>Vehicle</td>

					<td>@foreach($vehicles as $vehicle) @if($vehicle->id == $reservation->vehicle_id) {{$vehicle->name}} @endif @endforeach</td>
				</tr>
                <tr class="item">
					<td>Total Taxes Amount.</td>

					<td>Rs. {{$reservation->total_taxes_amount}}</td>
				</tr>
                <tr class="item">
					<td>Pick-Up-Location</td>

					<td>{{$reservation->pick_up_location}}</td>
				</tr>
                <tr class="item">
					<td>Drop-Off-Location</td>
					<td>{{$reservation->drop_off_location}}</td>
				</tr>
                <tr class="item">
					<td>Weight Of Transport.</td>

					<td>{{$reservation->weight_of_transport}}</td>
				</tr>

                <tr class="item">
					<td>Rate-Per-Hour.</td>

					<td>{{$reservation->rate_per_hour}}</td>
				</tr>
                <tr class="item">
					<td>Taxes Notes/Description</td>

					<td>{{$reservation->taxes_notes}}</td>
				</tr>
                <tr class="item">
					<td>Total Miscellaneous Charges</td>

					<td>Rs. {{$reservation->total_miscellaneous_charges}}</td>
				</tr>
                <tr class="item">
					<td>Miscellaneous Charges Notes</td>

					<td>{{$reservation->miscellaneous_charges_notes}}</td>
				</tr>


                <tr class="item">
					<td>Total Package Amount</td>

					<td>Rs. {{$reservation->total_rate_amount}}</td>
				</tr>
                <tr class="item">
					<td>Addtional Charges</td>

					<td>Rs. {{$reservation->additional_charges}}</td>
				</tr>
                <tr class="item">
					<td>Fuel Charges</td>

					<td>Rs. {{$reservation->fuel_charges}}</td>
				</tr>

				<tr class="item last">
					<td>Payment_Mothod</td>

					<td>{{$reservation->payment_method}}</td>
				</tr>

				<tr class="total">
					<td></td>

					<td>Total: Rs. {{$reservation->total_amount}}</td>
				</tr>
			</table>
		</div>
	</body>
</html>
