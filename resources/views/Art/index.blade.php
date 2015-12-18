@extends('global.master')

@section('page-title')
	all artworks
@stop

@section('content')
<ul>
	@foreach($auctions as $auction)
		<li>{{$auction->title}}</li>	
	@endforeach
</ul>
@stop