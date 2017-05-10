@include('includes.header')
@include('includes.menu')
	<div id="page-content" class="home-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading"><h2>PRODUCTS DETAIL</h2></div>
					<div class="products">
						<div class="col-xs-12">
							<div class="product">
								<div class="image"><a href="{{ url('productdetail', $product->id) }}"><img src="{{ url('images/' . $product->feature_image) }}" /></a></div>
								<div class="buttons">
<!-- 									<a class="btn cart" href="#"><span class="glyphicon glyphicon-shopping-cart"></span></a> -->

								<h3>Categoires</h3>

								@foreach($categories as $category)
									{{ $category->name }}
									<br/>
								@endforeach

								

									{!! Form::open(['route' => 'cart.store', 'method' => 'POST']) !!}

										<input type="hidden" name="id" value="{{ $product->id }}">
										<input type="hidden" name="name" value="{{ $product->name }}">
										<input type="hidden" name="price" value="{{ $product->price }}">
										<input type="number" style='width:70px;' name="qty">
										<br/><br/>
										{!! Form::submit('Add To Cart', ['class' => 'btn btn-primary']) !!}

									{!! Form::close() !!}
									
								</div>
								<div class="caption">
									<div class="name"><h3><a href="">{{ $product->name }}</a></h3></div>
									<div class="price">{{ $product->price }} Ks</div>
									<div class="buttons">
										<a class="btn btn-default" href="{{ url('/')}}">Back</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('includes.footer')
</body>
</html>
