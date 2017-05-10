@include('includes.header')
@include('includes.menu')
	<div id="page-content" class="single-page">
		<div class="container">
			<div class="row">
					
				<div class="page-header"><h1>Cart Items</h1></div>

			</div>

			@include('flash::message')

			<table class="table">
			   	<thead>
			       	<tr>
			           	<th>Product</th>
			           	<th>Qty</th>
			           	<th>Price</th>
			           	<th>Sub Total</th>
			           	<td>Action</td>
			       	</tr>
			   	</thead>
			 	<tbody>
					@foreach($items as $item)
						<tr>
							<td>{{ $item->name }}</td>
							<td>{{ $item->quantity }}</td>
							<td>{{ $item->price }}</td>
							<td>{{ $item->quantity * $item->price }}</td>
							<td>
							{!! Form::open(['method' => 'DELETE','route' => ['cart.destroy', $item->id],'style'=>'display:inline']) !!}
								    {!! Form::submit('Remove', ['class' => 'btn btn-danger']) !!}
								{!! Form::close() !!}
							</td>
						</tr>

					@endforeach
				</tbody>
				<tfoot>
				   		<tr>
				   			<td colspan="2">&nbsp;</td>
				   			<td>Total</td>
				   			<td>{{ Cart::getTotal() }}</td>
				   			<td><a href="{!! route('cart.edit', Cart::getTotal()) !!}" class="btn btn-primary">Check Out</a></td>
				   		</tr>
				   	</tfoot>
			</table>
		</div>
	</div>
	@include('includes.footer')
</body>
</html>
