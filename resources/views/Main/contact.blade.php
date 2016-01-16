@extends('global.master')

@section('page-title')
	Contact
@stop

@section('content')
<div class="container">
	<div class="row">
		<h1>Contact</h1>
		{!! Form::open([ 'route' => 'contact' ]) !!}
			{!! Form::label('auction', 'auction') !!}
			@if(isset($allAuctions))
				<div class="form-group">
          			<label for="reason">Mede gebruikers:</label>
      				<select name="auction" id="users" class="label-selector form-control" style="width: 100%;">
	                    @foreach($allAuctions as $auction)
	                        <option value="{{$auction->id}}">{{$auction->title}}</option>
	                    @endforeach
	                </select>
          		</div>
			@else
				{!! Form::hidden('auction', $auction->id) !!}
				{!! Form::text('auctionName', $auction->title) !!}
			@endif

			
			</br>
			<div class="formgroup">
				{!! Form::label('email', 'my email adress') !!}
				{!! Form::email('email', '', ['class' => 'form-control']) !!}</br>
			</div>
			<div class="form-group">
				{!! Form::label('question', 'question') !!}
				{!! Form::textarea('question', '', ['class' => 'form-control']) !!}</br>
			</div>
			{!! Form::submit('verzenden', ['class' => 'btn btn-primary']) !!}

		{!!  Form::close() !!}
	</div>
</div>
	

@stop

@section('scripts')
	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('.label-selector').select2();	
		});
	</script>
 	<script type="text/javascript">
 		$(function () {
 			// $('.footable').footable();
 		});
 	</script>
  @stop 
