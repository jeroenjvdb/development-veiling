@extends('global.master')

@section('page-title')
	my bids
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>my bids</h1>

				@if(count($auctions))
					<table>
						<tr>
							<th colspan="4">Auction details</th>
							<th>Estimated price</th>
							<th>End date</th>
							<th>Remaining time</th>
						</tr>
						@foreach($auctions as $auction)
							<tr>
								<td><img src="{{ $auction->pictures()->first()->url }}"></td>
								<td colspan="3">{{ $auction->title }}</td>
								<td>&euro; {{ $auction->est_low_price }} - &euro; {{ $auction->est_high_price }}</td>
								<td>{{ $auction->end_datetime }}</td>
								<td>{{ $auction->end_datetime }}</td>
							</tr>
						@endforeach
					</table>
				@else
					<p>You haven't made any bids</p>
				@endif
			</div>
		</div>
	</div>
@stop