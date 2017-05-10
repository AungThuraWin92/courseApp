@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Credit</div>

                <div class="panel-body">
                <div class="col-md-6">
                

                {!! Form::open(['route' => 'credit.index', 'files' => true, 'method' => 'GET']) !!}
                    <!-- <div class="form-group">
                        {!! Form::text('code', null, ['class' => 'form-control']) !!}
                    </div> -->

                        {!! Form::label('Used', 'Is used:') !!}
                        <select id="used" name="used" class="form-control">
                                <option value="1" selected>Used</option>
                                <option value="0">Unused</option>
                        </select>

                    <div class="form-group">
                        {!! Form::submit('Search', ['class' => 'btn btn-primary']) !!}
                    </div>

                {!! Form::close() !!}

                </div>

                <div class="form-group">
                    <a class="btn btn-primary pull-right" href="{!! route('credit.create') !!}">Generate Credit</a>
                </div>
                    <div class="clearfix"></div>
                    @include('flash::message')
                    <table class="table">
                        <tr>
                            <td>Serial No</td>
                            <td>Used By</td>
                            <td>Used</td>
                            <td>Action</td>
                        </tr>
                        @foreach($credits as $credit)
                        <tr>
                            <td>{{ $credit->serial_no }}</td>
                            <td>{{ $credit->used_by }}</td>
                            <td>{{ $credit->used }}</td>
                            <td>
                                {!! Form::open(['method' => 'DELETE','route' => ['credit.destroy', $credit->id],'style'=>'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr> 
                        @endforeach
                    </table>
                    <div class="pull-right">{{ $credits->render() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
