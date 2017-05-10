@include('includes.header')
@include('includes.menu')
	<div id="page-content" class="single-page">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="heading"><h2>Credit</h2></div>
					
					{!! Form::open(['route' => 'dashboard.store']) !!}
						{{ csrf_field() }}
						<div class="form-group">
							{!! Form::text('amount', null, ['class' => 'form-control']) !!}
							@if ($errors->has('amount'))
							    <span class="help-block">
							        <strong>{{ $errors->first('amount') }}</strong>
							    </span>
							@endif
						</div>
						<button type="submit" class="btn btn-1" name="buy" id="buy">Buy</button>
						<a class="btn btn-1" href="{{ url('dashboard') }}">Back</a>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
	@include('includes.footer')
</body>
</html>
