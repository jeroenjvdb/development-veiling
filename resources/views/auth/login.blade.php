@extends('global.master')

@section('page-title')
	login
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				{!!  Form::open(['route' => 'auth.login']) !!}
				<fieldset class="form-group">
					{!! Form::label('email', 'email: ') !!}</br>
					{!! Form::email('email', null, ['class' => 'form-control']) !!}</br>
				</fieldset>
				<fieldset class="form-group">
					{!! Form::label('password', 'wachtwoord: ') !!}</br>
					{!! Form::password('password', ['class' => 'form-control']) !!}</br>
				</fieldset>
					{!! Form::submit('inloggen', ['class' => 'btn btn-primary']) !!}</br>
				{!! Form::close() !!}
				<a href="{{ route('password.email') }}">wachtwoord vergeten?</a>
			</div>
		</div>
	</div>

@stop