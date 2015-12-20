@extends('global.master')

@section('page-title')
	{{ Auth::user()->name }}
@stop

@section('content')
	<div class="container">
		<h1>Profile</h1>
			<div class="row">
				<div class="col-md-12 box">
					<div class="row">
						<div class="col-sm-offset-1 col-sm-10">
							<div class="row">
								<h2>{{ $user->surname . ' ' . $user->name }}</h2>
								<div class="col-sm-4 vertical-divider"> 
									<p><span class="glyphicon glyphicon-envelope"></span> <a href="mailto:{{ $user->email }}">{{ $user->email }} </a></br>
									<span class="glyphicon glyphicon-earphone"></span> {{ $user->telephone ? $user->telephone : '+xx (0)x xxx xx' }} </p></br>
									<p>Straatnaam xxx <br>
										xxxx, Oostende</p>
								</div>
								<div class="col-sm-4">
									<h3>VAT-number</h3>
									<p>XX XXX XX XX</p>
									<h3>Account number</h3>
									<p>XX XXX XX XX</p>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		<h2>Active auctions</h2>
		{{--  add active auctions --}}
	</div>	
@stop