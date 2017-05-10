@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Category</div>

                <div class="panel-body">
                <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('category.create') !!}">Add New</a>
                    <div class="clearfix"></div>
                    @include('flash::message')
                    <table class="table">
                        <tr>
                            <td>Category Name</td>
                            <td>Description</td>
                            <td>Action</td>
                        </tr>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <a href="{!! route('category.show', $category->id) !!}" class="btn btn-default">View</a>
                                <a href="{!! route('category.edit', $category->id) !!}" class="btn btn-info">Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['category.destroy', $category->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr> 
                        @endforeach
                    </table>
                    <div class="pull-right">{{ $categories->render() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
