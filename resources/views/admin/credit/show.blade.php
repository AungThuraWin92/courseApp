@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Credit</div>

                <div class="panel-body">
                @if(count($credit) > 0)

                    <h1>{{ $credit->serial_no }}</h1>

                    @if($credit->used == 0)
                        <p>No Used</p>
                    @else
                        <p>Used</p>
                    @endif

                    <a href="{!! route('credit.index') !!}" class="btn btn-default">Back</a>

                @else
                    <p>No Record Found</p>
                    <a href="{!! route('credit.index') !!}" class="btn btn-default">Back</a>

                @endif

                

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
