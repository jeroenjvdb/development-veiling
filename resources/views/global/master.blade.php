<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('page-title') | Landoretti ART</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
	{!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') !!}
	{!! HTML::style("css/footable.core.css") !!}
	<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
	@include('global.styling')
</head>
<body>
	<nav>
		@include('global.nav')
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-xs-offset-2 col-xs-8">
				@if (count($errors) > 0)
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
			</div>
		</div>
		
	</div>

	<header>
		@yield('header')
	</header>

	<div class="content">
		@yield('content')
	</div>

	<footer>
		<div class="container">
			@include('global.footer')
		</div>
	</footer>
	@include('global.nav-bottom')

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/js/main.js"></script>
	{!! HTML::script("js/footable.all.min.js") !!}

	@yield('scripts')
</body>
</html>