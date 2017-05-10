@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Category</div>

                <div class="panel-body">
                <h1>{{ $category->name }}</h1>
                <p>{{ $category->description }}</p>
                <a href="{!! route('category.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
