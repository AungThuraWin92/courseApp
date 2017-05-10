@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Category</div>

                <div class="panel-body">
                    {!! Form::model($user, ['route' => ['adminuser.update', $user->id], 'method' => 'patch']) !!}

                        <div class="form-group col-sm-12">
                            {!! Form::label('name', 'User Name:') !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'disabled']) !!}

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif

                        </div>

                        <div class="form-group col-sm-12">
                            {!! Form::label('Admin', 'Admin:') !!}
                            <input type="checkbox" name="is_admin" value="1"> Admin
                        </div>

                        <div class="form-group col-sm-12">
                            {!! Form::label('email', 'User Email:') !!}
                            {!! Form::email('email', null, ['class' => 'form-control', 'disabled']) !!}

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group col-md-12">
                            {!! Form::label('password', 'Password:') !!}
                            <input id="password" type="password" class="form-control" name="password" disabled required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="clearfix"></div>

                        <div class="form-group col-md-12">
                            {!! Form::label('credit', 'Credit:') !!}
                            <input id="credits" type="text" class="form-control" name="credits" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{!! route('adminuser.index') !!}" class="btn btn-default">Cancel</a>
                        </div>


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
