<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('page-title') | Landoretti ART</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">

	{!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') !!}
	<style>
		html{
			/*padding: 5px;*/
		}
		h1{
			font-size: 36px;
		}
		h2{
			padding-bottom: 30px;
		}

		h3{
			margin-top: 10px;
		}

		footer{
			margin-top: 140px;
		}

		.content>div{
			padding: 50px 0;
		}

		nav{
			margin-bottom: -20px;
		}
		header{
			margin-top: -10px;
		}

		footer{
			border-top: 1px solid #f3f3f3;
		}
		.footercolumn{
			/*border-top: 1px solid #f3f3f3;*/
			border-right: 1px solid #f3f3f3;
		}

		.footercolumn-right{
			border-right-style: hidden;
		}


		.grey{
			background-color: #f3f3f3;
		}

		.center{
			text-align: center;
		}

		.carousel-inner{
			max-height: 850px;
			overflow: hidden;
			position: relative;
		}

		.carousel-inner .item{
			position: relative;
			max-height: 850px;
		}

		.carousel-inner img{
			width: 100%;
		}

		.carousel-caption{
			background-color: rgb(6, 25, 111);
			opacity: 0.8;
			padding: 15px;
			bottom: 100px;
			text-align: left;
		}

		.box{
			border: 1px solid #f3f3f3;
			padding: 20px;
		}

		.bid{
			margin-left: -5px;
			margin-right: -5px;
			background-color: rgb(1, 166, 160);
		}

		.bid>.row{
			padding: 5px;
		}

		.border-right{
			border-right: 1px solid #f3f3f3;
		}

		table{
			width: 100%;
			table-layout: fixed;
		}

		table, th, td{
			border: 1px solid black;
			border-collapse: collapse;
		}

		th, td {
			padding: 5px;
			text-align: left;
		}

		.navbar-header{
			position: absolute;
			top: -15px;
			/*z-index: 16;*/
		}

		.navbar-top{
			list-style-type: none;
			margin-left: -40px;
			margin-top: 15px;

		}

		.navbar-top li{
			margin-left: 20px;
			margin-right: 20px;
		}

		.navbar-top li:first-of-type{
			margin-left: 0;
		}

		.btn-no{
			border: none;
			background-color: transparent;
		}

		.navbar-form
		{
			/*margin-right: 0;*/
			padding-right: 0; 
		}

		.vertical-divider{
			border-right: 1px solid #f3f3f3;
		}

	</style>
</head>
<body>
	<nav>
		@include('global.nav')
	</nav>

	<header>
		@yield('header')
	</header>

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
	<div class="content">
		@yield('content')
	</div>

	<footer>
		<div class="container">
			@include('global.footer')
		</div>
	</footer>
	@include('global.nav')

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	@yield('scripts')
</body>
</html>