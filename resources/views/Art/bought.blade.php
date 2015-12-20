@extends('global.master')

@section('page-title')
	thank you for buying {{ $art->title }}
@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Thank you</h1>
			<p>You've just bought {{ $art->title }}</p>
		</div>
	</div>
</div>
@stop