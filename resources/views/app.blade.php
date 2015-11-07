<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>KWFS - Laravel</title>
	<link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/libs.css">
    <script src="/js/libs.js"></script>

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid" id="container">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">KW Laravel</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="/customers/locations">Sales</a></li>
					<li><a href="/customers/quotes">Quotes</a></li>
					<li><a href="/customers">Customers</a></li>
					<li><a href="/machines">Machines</a></li>
					<li><a href="#">|</a></li>
					<li><a href="/buckets">Buckets</a></li>
					<li><a href="/augers">Augers</a></li>
					<li><a href="/brackets">Brackets</a></li>
					<li><a href="/motors">Motors</a></li>
					<li><a href="/extras">Extras</a></li>
					<li><a href="#">|</a></li>
					<li><a href="/locations">(Locations)</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="/auth/login">Login</a></li>
						<li><a href="/auth/register">Register User</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/auth/logout">Logout</a></li>
								
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row mainrow">
      		<div class="panel panel-default">
        		<div class="panel-heading">&nbsp;</div>
​				<div class="panel-body">
					@yield('content')
					<center class="footer">&copy;{{ date('Y') }} www.kwfs.co.uk</center>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
@include('flash')
</html>
