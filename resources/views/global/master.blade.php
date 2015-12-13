<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>veiling | @yield('page-title')</title>
</head>
<body>
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif


	@yield('content')
</body>
</html>