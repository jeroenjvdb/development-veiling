@extends('global.master')

@section('page-title')
	create new auction
@stop

@section('content')
	<div class="container">
		<div class="col-md-9">
			<h1>add a new auction</h1>
			{!! Form::open(['route' => 'art.store', 'files' => true]) !!}
				<div class="row">
					<div class="col-md-8">
						{!! Form::select('style', $styleArray, null, ['class' => 'form-control']) !!}
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 form-group">
						{!! Form::label('Auction title', 'title') !!}</br>
						{!! Form::text('title', '', array('placeholder' => 'Auction title', 'class' => 'form-control')) !!}
					</div>
					<div class="col-md-4">
						{!! Form::label('date_of_creation', 'Year') !!}</br>
						{!! Form::text('date_of_creation', '', array('placeholder' => 'X X X X', 'class' => 'form-control')) !!}
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						{!! Form::label('Width', 'width') !!}</br>
						{!! Form::text('width', '', array('placeholder' => 'X X X X', 'class' => 'form-control')) !!}
					</div>
					<div class="col-md-4">
						{!! Form::label('Height', 'height') !!}</br>
						{!! Form::text('height', '', array('placeholder' => 'X X X X', 'class' => 'form-control')) !!}
					</div>
					<div class="col-md-4">
						{!! Form::label('depth (optional)', 'depth') !!}</br>
						{!! Form::text('depth', '', array('placeholder' => 'X X X X', 'class' => 'form-control')) !!}
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						{!! Form::label('Description', 'description') !!}</br>
						{!! Form::textarea('description', '', array('placeholder' => 'Describe your auction as thorough as possible', 'class' => 'form-control')) !!}
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						{!! Form::label('Condition', 'condition') !!}</br>
						{!! Form::textarea('condition', '', array('placeholder' => 'what\'s the condition of the artwork?', 'class' => 'form-control')) !!}
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						{!! Form::label('Origin', 'origin') !!}</br>
						{!! Form::text('origin', '', array('placeholder' => 'What\'s the origin og the artwork?', 'class' => 'form-control')) !!}
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						{!! Form::label('Artist', 'artist') !!}
						{!! Form::text('artist', '', array('placeholder' => 'artist name', 'class' => 'form-control')) !!}
					</div>
					<div class="col-md-4">
						{!! Form::label('Color', 'color') !!}
						{!! Form::text('color', '', array('placeholder' => 'describe the color.', 'class' => 'form-control')) !!}
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						{!! Form::label('photos') !!}
						<p>
							Please upload one picture with the signature of the artwork, and one picture of the artwork <br>
							You can upload up to 3 pictures with a maximum of 10MB each.
						</p>
					</div>

					<div class="col-md-4">
						{!! Form::label('artwork', 'picture of the artwork') !!}</br>
						{!! Form::file('artwork') !!}
					</div>
					<div class="col-md-4">
						{!! Form::label('signature', 'signature of image') !!}</br>
						{!! Form::file('signature') !!}
					</div>
					<div class="col-md-4">
						{!! Form::label('optional_image', 'optional image') !!}</br>
						{!! Form::file('optional_image') !!}
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-12">
						<h2>Pricing</h2>	
					</div>
					
					<div class="col-md-4">
						{!! Form::label('Minimum estimate pricing', 'min_price') !!}</br>
						{!! Form::text('est_low_price', '', array('placeholder' => 'X X X X', 'class' => 'form-control')) !!}
					</div>
					<div class="col-md-4">
						{!! Form::label('Maximum estimate pricing', 'max_price') !!}</br>
						{!! Form::text('est_high_price', '', array('placeholder' => 'X X X X', 'class' => 'form-control')) !!}
					</div>
					<div class="col-md-4">
						{!! Form::label('Buyout price (optional)', 'buyout') !!}</br>
						{!! Form::text('buyout', '', array('placeholder' => 'X X X X', 'class' => 'form-control')) !!}
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						{!! Form::label('End date', 'end_datetime') !!}</br>
						{!! Form::date('end_datetime', '', ['class' => 'form-control', 'placeholder' => 'mm/dd/yyyy hh:mm:ss']) !!}
					</div>
					<div class="col-md-8">
						<span>Attention</span>
						<p>
							You can not change the information after adding this auction.</br>
							If you're not certain about the information of your artwork, please ask for help.</br>
							We will answer your question as soon as possible.
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<input type="checkbox" value="true" id="squaredTwo" name="TermsAgree" />
						<label for="TermsAgree">I agree to <a href="#">the terms and conditions</a></label>
					</div>
				</div>
				{!! Form::submit('Add Aucion', ['class' => 'btn btn-secondary']) !!}

			{!! Form::close() !!}
		</div>
	</div>
@stop