<nav id="menu" class="navbar">
	<div class="container">
		<div class="navbar-header"><span id="heading" class="visible-xs">Categories</span>
		  <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
		</div>
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li><a href="{{ url('/product') }}">Product</a></li>
				<li><a href="{{ url('/login') }}">Login</a></li>
				<li><a href="{{ url('/register') }}">Register</a></li>
			</ul>
		</div>
	</div>
</nav>