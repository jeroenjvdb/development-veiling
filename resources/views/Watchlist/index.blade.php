@extends('global.master')

@section('page-title')
	watchlist
@stop

@section('content')
	<div class="container">
		<h1>My watchlist</h1>
		<div class="row">
			<div class="col-md-12">
				<ul>
					<li>all</li>
					<li>active</li>
					<li>ended</li>
				</ul>
				<table>
					<tr>
						<th colspan="4">Auction details</th>
						<th>Estimated price</th>
						<th>End date</th>
						<th>Remaining time</th>
					</tr>
					@foreach($watchlist as $auction)
						<tr>
							<td><img src="{{ $auction->art->pictures()->first()->url }}" alt=""></td>
							<td colspan="3">{{ $auction->art->title }}</td>
							<td>&euro; {{ $auction->art->est_low_price }} - &euro; {{ $auction->art->est_high_price }}</td>
							<td>{{ $auction->art->end_datetime }}</td>
							<td>{{ $auction->art->end_datetime }}</td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>
@stop