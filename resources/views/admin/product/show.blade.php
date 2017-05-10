@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Category</div>
                <div class="panel-body">
                <img class="img-responsive center-block" src="{{ url('images/' . $product->feature_image) }}">
                <h1>{{ $product->name }}</h1>
                <p>{{ $product->price }}</p>
                <p>{{ $product->stock }}</p>
                <p>{{ $product->description }}</p>
                <a href="{!! route('product.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
