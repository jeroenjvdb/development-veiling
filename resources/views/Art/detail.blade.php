@extends('global.master')

@section('page-title')
	{{ $auction->title }} auction
@stop

@section('content')
<style>
	.right-column{
		text-align: right;
	}

	.right-column .box input{
		font-size: 20px;
		padding: 10px;
	}



	.bid input[type='text']{
		max-width: 100%;
	}
	.bid input[type="submit"]{
		background-color: transparent;
		border-style: hidden;
		color:white;
		text-align: left;
	}

	.info p{
		margin-top: 0;
		margin-bottom: 0;
	}
	.estimate{
		font-size: 1.5em;
		color: #211582;
	}

	.info .estimate-numbers{
		font-size: 3em;
	}

	.buyNow{
		color: rgb(1, 166, 160);
		text-decoration: underline;
	}
	.buyNow:hover{
		color: #211582;
	}

	.question{
		/*margin: 20px auto;*/
		/*width: 200px;*/
		text-transform: uppercase;
		color:white;
		text-align: center;
		font-size: 2em;
	}

	.question div{
		width: 100%;
		background-color: green;
		padding: 20px;
		margin: 20px auto;
	}

</style>
	<div class="container">
		<div class="row">
			<h1>{{ $auction->title }}</h1>
			{{ $auction->toGo['months'] . 'M' .$auction->toGo['days'] . 'd' . $auction->toGo['hours'] . 'h' . $auction->toGo['minutes'] . 'm' . ' left'  }}, ({{ count($auction->bids) }} {{ trans('art.bids') }}) <span class="glyphicon glyphicon-menu-hamburger"></span>
			{{-- Hoe lang nog, @of bid, hemburger icon --}}
		</div>
		<div class="row">
			<div class="col-md-8 images">
				<img src="{{ $auction->pictures->first()->url }}" alt="" style="max-width: 100%;" id="header-image">
				<div class="row"> 
					@foreach($auction->pictures as $img)
						<div class="col-md-4">
							<img src="{{ $img->url }}" alt="" style="max-width: 100%;" class="sub-image {{ $img->isMaster ? 'active' : '' }} ">
						</div>
					@endforeach
				</div>
			</div>
			<div class="col-md-4 right-column">
				<h2>{{ $auction->title }}</h2>
				<p>{{ $auction->date_of_creation }},{{ $auction->artist->name }} </p>
				<hr>
				<p>{{-- hoe lang nog --}}{{ $auction->toGo['months'] . 'M' .$auction->toGo['days'] . 'd' . $auction->toGo['hours'] . 'h' . $auction->toGo['minutes'] . 'm' . ' left'  }}</p>
				<p>{{ $auction->end_datetime }}</p>
				<hr>
				<p>een beetje lorem ipsum</p>
				<div class="box">
					<div class="info">
						<p class="estimate">Estimated price:</p>
						<p class="estimate estimate-numbers">&euro; {{ $auction->est_low_price }} - &euro; {{ $auction->est_high_price }}</p>
						@if(isset($auction->buyout))
							{!! Html::linkRoute('art.buynow', trans('art.buy now') . ' &euro; ' . $auction->buyout, ['id' => $auction->id], ['class' => 'buyNow']) !!}
							{{-- <p>  {{ $auction->buyout }}</p> --}}
						@endif
					</div>
					<p>{{ trans('art.bids') }}: {{ count($auction->bids) }} </p>
					<div class="container-fluid bid">
						<div class="row">
							{!! Form::open(['route' => array('bid', 'id' => $auction->id)]) !!}
								<div class="col-md-7">{!! Form::text('amount', '') !!}</div>
								<div class="col-md-5">{!! Form::submit('bid now >') !!}</div>
							{!! Form::close() !!}
						</div>
					</div>

					@if(Auth::user() && !$auction->myWatchlist())
						{!! Html::link(route('watchlist.create', ['id' => $auction->id]), trans('art.add watchlist')) !!}
					@endif
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 box">
				
					<div class="col-md-8 border-right">
						<p><strong>{{trans('art.description')}}</strong></p>
						<p>{{{ $auction->description_nl }}}</p></br>
						<p><strong>{{ trans('art.condition') }}</strong></p>
						<p>{{{ $auction->condition_nl }}}</p>
					</div>
					<div class="col-md-4">
						<p><strong>{{trans('art.artist')}}</strong> <br>
						{{ $auction->artist->name }} <br>
						{{ $auction->artist->country }} <br>
						{{ $auction->artist->date_of_birth }} - {{ $auction->artist->date_of_death }}</p>
						<p><strong>{{trans('art.dimensions')}}</strong> <br>
						{{ $auction->width }} x {{ $auction->height }}  {{ $auction->depth ? ' x ' . $auction->depth : '' }}</p>
						<p><strong>{{trans('art.color')}}</strong> <br>
							{{ $auction->color }}</p>
						<div>
							<a href="{{ route('contact', ['slug' => $auction->slug]) }}" class="question"><div>{{trans('art.ask')}}</div></a>
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