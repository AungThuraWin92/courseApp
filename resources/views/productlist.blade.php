@include('includes.header')
@include('includes.menu')
	<div id="page-content" class="home-page">
		<div class="container">
			<div class="row">
				@include('includes.casual')
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="heading"><h2>PRODUCTS Listing</h2></div>
					@include('flash::message')
					<div class="products">
						
						@foreach ($products as $product)

							<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								<div class="product">
									<div class="image"><a href=""><img src="{{ url('images/' . $product->feature_image) }}" /></a></div>
									<div class="caption">
										<div class="name"><h3><a href="{{ url('productdetail', $product->id) }}">{{ $product->name }}</a></h3></div>
										<div class="price">{{ $product->price }} Ks</div>

										{!! Form::open(['route' => 'cart.store', 'method' => 'POST']) !!}

											<input type="hidden" name="id" value="{{ $product->id }}">
											<input type="hidden" name="name" value="{{ $product->name }}">
											<input type="hidden" name="price" value="{{ $product->price }}">
											<input type="number" style='width:70px;' name="qty">
											<br/><br/>
											{!! Form::submit('Add To Cart', ['class' => 'btn btn-primary']) !!}

										{!! Form::close() !!}
									</div>
								</div>
							</div>

						@endforeach 
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('includes.footer')
</body>
</html>
