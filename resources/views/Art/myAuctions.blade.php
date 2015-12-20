@extends('global.master')

@section('page-title')
	My auctions
@stop

@section('content')
	<div class="container">
		<h1>My auctions</h1>
		{!! Html::linkRoute('art.create', 'add new auction') !!}
		<div class="row">
			<div class="col-md-12">
				<h2>Pending</h2>
				@if(count($pending) > 0)
				<table>
					<tr>
						<th colspan="4">Auction details</th>
						<th>Estimated price</th>
						<th>End date</th>
						<th>Remaining time</th>
					</tr>
					@foreach($pending as $auction)
						<tr>
							<td>{{-- picture --}}</td>
							<td colspan="3">{{ $auction->art->title }}</td>
							<td>&euro; {{ $auction->art->est_low_price }} - &euro; {{ $auction->art->est_high_price }}</td>
							<td>{{ $auction->art->end_datetime }}</td>
							<td>{{ $auction->art->end_datetime }}</td>
						</tr>
					@endforeach
				</table>
				@else
					<p>You have no pending auctions</p>
				@endif
				<h2>Refused</h2>
				@if(count($refused) > 0)
				<table>
					<tr>
						<th colspan="4">Auction details</th>
						<th>Estimated price</th>
						<th>End date</th>
						<th>Remaining time</th>
					</tr>
					@foreach($refused as $auction)
						<tr>
							<td>{{-- picture --}}</td>
							<td colspan="3">{{ $auction->art->title }}</td>
							<td>&euro; {{ $auction->art->est_low_price }} - &euro; {{ $auction->art->est_high_price }}</td>
							<td>{{ $auction->art->end_datetime }}</td>
							<td>{{ $auction->art->end_datetime }}</td>
						</tr>
					@endforeach
				</table>
				@else
					<p>You have no pending auctions</p>
				@endif
				<h2>Active</h2>
				@if(count($active) > 0)
				<table>
					<tr>
						<th colspan="4">Auction details</th>
						<th>Estimated price</th>
						<th>End date</th>
						<th>Remaining time</th>
					</tr>
					@foreach($active as $auction)
						<tr>
							<td>{{-- picture --}}</td>
							<td colspan="3">{{ $auction->art->title }}</td>
							<td>&euro; {{ $auction->art->est_low_price }} - &euro; {{ $auction->art->est_high_price }}</td>
							<td>{{ $auction->art->end_datetime }}</td>
							<td>{{ $auction->art->end_datetime }}</td>
						</tr>
					@endforeach
				</table>
				@else
					<p>You have no pending auctions</p>
				@endif
				<h2>Expired</h2>
				@if(count($expired) > 0)
				<table>
					<tr>
						<th colspan="4">Auction details</th>
						<th>Estimated price</th>
						<th>End date</th>
						<th>Remaining time</th>
					</tr>
					@foreach($expired as $auction)
						<tr>
							<td>{{-- picture --}}</td>
							<td colspan="3">{{ $auction->art->title }}</td>
							<td>&euro; {{ $auction->art->est_low_price }} - &euro; {{ $auction->art->est_high_price }}</td>
							<td>{{ $auction->art->end_datetime }}</td>
							<td>{{ $auction->art->end_datetime }}</td>
						</tr>
					@endforeach
				</table>
				@else
					<p>You have no pending auctions</p>
				@endif
				<h2>Sold</h2>
				@if(count($sold) > 0)
				<table>
					<tr>
						<th colspan="4">Auction details</th>
						<th>Estimated price</th>
						<th>End date</th>
						<th>Remaining time</th>
					</tr>
					@foreach($sold as $auction)
						<tr>
							<td>{{-- picture --}}</td>
							<td colspan="3">{{ $auction->art->title }}</td>
							<td>&euro; {{ $auction->art->est_low_price }} - &euro; {{ $auction->art->est_high_price }}</td>
							<td>{{ $auction->art->end_datetime }}</td>
							<td>{{ $auction->art->end_datetime }}</td>
						</tr>
					@endforeach
				</table>
				@else
					<p>You have no pending auctions</p>
				@endif
			</div>
		</div>
	</div>
@stop