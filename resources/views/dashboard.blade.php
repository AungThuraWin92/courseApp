@include('includes.header')
@include('includes.menu')
	<div id="page-content" class="single-page">
		<div class="container">
			<div class="row">
					
					<h1>Dashboard</h1>

					@include('flash::message')

					<h3>User Name - {{ $user->name }}</h3>
					<p>Email - {{ $user->email }}</p>
					@if($user->credits == 0)

						<p>Credit - 0 Ks</p>

					@else

						<p>Credit - {{ $user->credits }} Ks</p>

					@endif

					<a class="btn btn-primary" href="{!! route('dashboard.create') !!}">Buy Credit</a>
			</div>
		</div>
	</div>
	@include('includes.footer')
</body>
</html>
