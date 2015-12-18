@extends('global.master')

@section('page-title')
	{{ $auction->title }} auction
@stop

@section('content')
	<div class="container">
		<div class="row">
			<h1>{{ $auction->title }}</h1>
			{{-- Hoe lang nog, @of bid, hemburger icon --}}
		</div>
		<div class="row">
			<div class="col-md-8">
				{{-- pictures --}}
			</div>
			<div class="col-md-4">
				<h2>{{ $auction->title }}</h2>
				<p>{{ $auction->date_of_creation }},{{-- artist name --}} </p>
				<hr>
				<p>{{-- hoe lang nog --}}</p>
				<p>{{ $auction->end_datetime }}</p>
				<hr>
				<p>een beetje lorem ipsum</p>
				<div class="box">
					<p>Estimated price:</p>
					<p>&euro; {{ $auction->est_low_price }}-&euro; {{ $auction->est_high_price }}</p>
					@if(isset($auction->buyout))
						<p>Buy now for &euro;  {{ $auction->buyout }}</p>
					@endif
					<p>bids: {{-- #of bids --}}</p>
					<div class="container-fluid bid">
						<div class="row">
							{!! Form::open() !!}
								<div class="col-md-7">{!! Form::text('amount', '') !!}</div>
								<div class="col-md-5">{!! Form::submit() !!}</div>
							{!! Form::close() !!}
						</div>
					</div>

					@if(Auth::user() && !$auction->myWatchlist())
						{!! Html::link(route('watchlist.create', ['id' => $auction->id]), 'add to my watchlist') !!}
					@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 box">
				
					<div class="col-md-8 border-right">
						<p><strong>Description</strong></p>
						<p>{{{ $auction->description_nl }}}</p></br>
						<p><strong>Condition</strong></p>
						<p>{{{ $auction->condition_nl }}}</p>
					</div>
					<div class="col-md-4">
						<p><strong>artist</strong> <br>
						{{ $auction->artist->name }} <br>
						{{ $auction->artist->country }} <br>
						{{ $auction->artist->date_of_birth }} - {{ $auction->artist->date_of_death }}</p>
						<p><strong>Dimensions</strong> <br>
						{{ $auction->width }} x {{ $auction->height }}  {{ $auction->depth ? ' x ' . $auction->depth : '' }}</p>
						<p><strong>Color</strong> <br>
							{{ $auction->color }}</p>
						<div>
							<a href="">ASK A GUESTION ABOUT THIS AUCTION</a>
						</div>
					</div>
				
			</div>
			
		</div>
	</div>
	<div class="grey box">
		<div class="container">
			<div class="row">
				{{-- related items --}}
				<div class="col-md-4">test</div>
				<div class="col-md-4"></div>
				<div class="col-md-4"></div>
			</div>
		</div>
	</div>

@stop