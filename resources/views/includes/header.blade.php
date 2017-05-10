<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Free Bootstrap Themes by 365Bootstrap dot com - Free Responsive Html5 Templates">
    <meta name="author" content="http://www.365bootstrap.com">
	
    <title>Ecommerce</title>
	
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}"  type="text/css">
	
	<!-- Custom CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
	
	
	<!-- Custom Fonts -->
    <link rel="stylesheet" href="{{ url('assets/font-awesome/css/font-awesome.min.css') }}"  type="text/css">
    <link rel="stylesheet" href="{{ url('assets/fonts/font-slider.css') }}" type="text/css">
	
	<!-- jQuery and Modernizr-->
	<script src="{{ url('assets/js/jquery-2.1.1.js') }}"></script>
	
	<!-- Core JavaScript Files -->  	 
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
	<!--Top-->
	<nav id="top">
		<div class="container">
			<div class="row">
				<div class="col-xs-6">
					
				</div>
				<div class="col-xs-6">
					<ul class="top-link">
						<li class="dropdown">

						    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
						    	@if(Auth::user())
						    		{{ Auth::user()->name }} <span class="caret"></span>
						    	@endif
						    </a>

						    <ul class="dropdown-menu" role="menu">
						    	<li>
						    		<a href="{{ url('cart') }}"><span class="glyphicon glyphicon-user"></span> Cart Item</a>
						    	</li>
						    	<li>
						    		<a href="{{ url('dashboard') }}"><span class="glyphicon glyphicon-user"></span> My Account</a>
						    	</li>
						        <li>
						            <a href="{{ route('logout') }}"
						                onclick="event.preventDefault();
						                         document.getElementById('logout-form').submit();">
						                Logout
						            </a>

						            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						                {{ csrf_field() }}
						            </form>
						        </li>
						    </ul>
						</li>

					</ul>

				</div>
			</div>
		</div>
	</nav>
	<!--Navigation-->