<div class="form-group col-sm-12">
    {!! Form::label('name', 'User Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}

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
    {!! Form::email('email', null, ['class' => 'form-control']) !!}

    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

<div class="form-group col-md-12">
    {!! Form::label('password', 'Password:') !!}
    <input id="password" type="password" class="form-control" name="password" required>

    @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
</div>

<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('adminuser.index') !!}" class="btn btn-default">Cancel</a>
</div>
