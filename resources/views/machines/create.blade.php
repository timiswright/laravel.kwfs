@extends('app')
@section('content')
@include('partials.alerts.errors')

<div class="panel-body">
            {!! Form::open(['method' => 'POST', 'route' => 'machines.store', 'class' => 'form-horizontal']) !!}
            {!! Form::token() !!}
            {!! Form::hidden('customer_id', $customer->id, ['class' => 'form-control', 'required' => 'required']) !!} 
        <div class="row col-md-12">
            @include('machines._form')
            <div class="form-group @if($errors->first('measurement1')) has-error @endif">
            {!! Form::label('measurement1', 'Main Auger Measurement') !!}
            {!! Form::text('measurement1', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('measurement1') }}</small>
        </div>

        <div class="form-group @if($errors->first('measurement2')) has-error @endif">
            {!! Form::label('measurement2', 'Second Auger Measurement') !!}
            {!! Form::text('measurement2', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('measurement2') }}</small>
        </div>

    </div>
    <div class="col-md-1">
        &nbsp;
    </div>
    <div class="row col-md-12">
        <div class="form-group @if($errors->first('notes')) has-error @endif">
            {!! Form::label('notes', 'Extra Notes') !!}
            {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('notes') }}</small>
        </div>
    </div>

        <div class="row col-md-12">    
            <hr width="80%">
                <div class="btn-group pull-left">
                    <a href="{{ route('machines.index') }}" class="btn btn-info">Back</a>
                </div>
                <div class="btn-group pull-right">
                    {!! Form::submit("Add", ['class' => 'btn btn-primary']) !!}
                </div>
        </div>
    {!! Form::close() !!}      
</div>
@endsection