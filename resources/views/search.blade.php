@extends('global.master')

@section('page-title')
	search: {{ $search }}
@stop

@section('content')
<div class="container">
	<h1>Search: {{ $search }}</h1>
	<div class="row">
	<ul class="list-inline">
		<li><strong>SORT BY:</strong></li>
		<li><a href="{{ route($route, ['search' => $search ,'sort' => 'ending-soonest']) }}">ending soonest</a></li>
		<li><a href="{{ route($route, ['search' => $search, 'sort' => 'ending-latest']) }}">ending latest</a></li>
		<li><a href="{{ route($route, ['search' => $search, 'sort' => 'new']) }}">new auctions</a></li>
		<li><a href="{{ route($route, ['search' => $search, 'sort' => 'popular']) }}">popular auctions</a></li>
	</ul>
	<a href="#" class="right advanced-options-handler">Advanced Options</a>
	</div>
	<div class="row hidden advanced-options">
		<div class="col-md-3">
			<h4>Price</h4>
			<ul class="list-unstyled">
				
				<li><a href="{{ route($route, ['search' => $search, 'class' => 'price', 'filter' => '5000', 'sort' => $sort]) }}">Up to 5,000</a></li>
				<li><a href="{{ route($route, ['search' => $search, 'class' => 'price', 'filter' => '10000', 'sort' => $sort]) }}">5,000-10,000</a></li>
				<li><a href="{{ route($route, ['search' => $search, 'class' => 'price', 'filter' => '25000', 'sort' => $sort]) }}">10,000-25,000</a></li>
				<li><a href="{{ route($route, ['search' => $search, 'class' => 'price', 'filter' => '50000', 'sort' => $sort]) }}">25,000-50,000</a></li>
				<li><a href="{{ route($route, ['search' => $search, 'class' => 'price', 'filter' => '100000', 'sort' => $sort]) }}">50,000-100,000</a></li>
				<li><a href="{{ route($route, ['search' => $search, 'class' => 'price', 'filter' => 'plus', 'sort' => $sort]) }}">above</a></li>

			</ul>
		</div>
		<div class="col-md-3">

			<h4>Era</h4>
			<ul class="list-unstyled">
				<li><a href="{{ route($route, ['search' => $search, 'class' => 'era', 'filter' => 'pre-war', 'sort' => $sort]) }}">Pre-war</a></li>
				<li><a href="{{ route($route, ['search' => $search, 'class' => 'era', 'filter' => '40-50', 'sort' => $sort]) }}">1940s-1950s</a></li>
				<li><a href="{{ route($route, ['search' => $search, 'class' => 'era', 'filter' => '60-80', 'sort' => $sort]) }}">1960s-1980s</a></li>
				<li><a href="{{ route($route, ['search' => $search, 'class' => 'era', 'filter' => '90', 'sort' => $sort]) }}">1990s-Present</a></li>
			</ul>
			<h4>media</h4>
			<ul class="list-unstyled">
				<li>Design</li>
				<li>Paintings and Works on Paper</li>
				<li>Photographs</li>
				<li>Prints and Multiples</li>
				<li>Sculpture</li>
			</ul>
	</div>
	<div class="col-md-3">
			<h4>Style</h4>

			<ul class="list-unstyled">
				@foreach($footerStyle as $style)
					<li><a href="{{ route($route, ['search' => $search, 'class' => 'style', 'filter' => $style->id, 'sort' => $sort]) }}">{{ $style->name }}</a></li>
				@endforeach
			</ul>
		</div>
		
</div>
<hr>
<div class="container">
	<div class="row">

		@foreach($art as $auction)
			<a href="{{ route('art.show', array('slug' => $auction->slug)) }}">
				<div class="col-sm-3">
					<div class="thumbnail">
						@if($auction->pictures()->first())
						<img src="{{ $auction->pictures()->first()->url }}" alt="">
						@endif
					</div>
					{{ $auction->date_of_creation }}, {{ $auction->artist->name }} <br>
					{{$auction->title}} <br>
					{{ $auction->highest_bid != 0 ? $auction->highest_bid : $auction->est_low_price }}
				</div>	
			</a>

		@endforeach
	</div>
	
</div>
	
	<div class="row">
		<h2>FAQ</h2>

		@foreach($FAQ as $question)
			<div>
				<p><strong>{{ $question->question }}</strong></p>
				<p>{{ $question->answer }}</p>
			</div>
		@endforeach
	</div>
</div>
@stop 