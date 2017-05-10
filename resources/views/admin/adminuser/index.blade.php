@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin User</div>

                <div class="panel-body">
                <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('adminuser.create') !!}">Add New</a>
                    <div class="clearfix"></div>
                    @include('flash::message')
                    <table class="table">
                        <tr>
                            <td>User Name</td>
                            <td>Email</td>
                            <td>Credit</td>
                            <td>Action</td>
                        </tr>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->credits }}</td>
                            <td>
                                <a href="{!! route('adminuser.edit', $user->id) !!}" class="btn btn-info">Edit</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['adminuser.destroy', $user->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr> 
                        @endforeach
                    </table>
                    <div class="pull-right">{{ $users->render() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
