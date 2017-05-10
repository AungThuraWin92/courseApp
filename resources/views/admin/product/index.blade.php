@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Product</div>

                <div class="panel-body">
                <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('product.create') !!}">Add New</a>
                    <div class="clearfix"></div>
                    @include('flash::message')
                    <table class="table">
                        <tr>
                            <td>Product Name</td>
                            <td>Price</td>
                            <td>Stock</td>
                            <td>Description</td>
                            <td>Action</td>
                        </tr>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <a href="{!! route('product.show', $product->id) !!}" class="btn btn-default">View</a>
                                <a href="{!! route('product.edit', $product->id) !!}" class="btn btn-info">Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['product.destroy', $product->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr> 
                        @endforeach
                    </table>
                    <div class="pull-right">{{ $products->render() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
