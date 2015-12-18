@extends('global.master')

@section('page-title')
	FAQ
@stop

@section('content')
	<div class="container">
	<h1>Find what you're looking for?</h1>
		<div class="row box">
			@foreach($FAQ as $question)
				<div class="col-xs-3">
					<a href="#">{{ $question->question }}</a>
				</div>
			@endforeach
		</div>
		

		@foreach($FAQ as $question)
			<div class="row">
				<div class="col-xs-1"><p>Q:</p></div>
				<div class="col-xs-11"><p>{{ $question->question }}</p></div>
			</div>
			<div class="row">
				<div class="col-xs-1"><p>A:</p></div>
				<div class="col-xs-11"><p>{{ $question->answer }}</p></div>
			</div>
		@endforeach
	</div>
@stop