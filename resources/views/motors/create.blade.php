@extends('app')
@section('content')
@include('partials.alerts.errors')
 
    {!! Form::open(['method' => 'POST', 'route' => 'motors.store', 'class' => 'form-horizontal']) !!}
    {!! Form::token() !!}
    
        <div class="form-group">
            {!! Form::label('motor_type', 'Motor Type') !!}
            {!! Form::text('motor_type', null, ['class' => 'form-control', 'required' => 'required', 'autofocus'=>'autofocus']) !!}
            <small class="text-danger">{{ $errors->first('motor_type') }}</small>
        </div>
                
        <div class="btn-group pull-right col-md-1">
            {!! Form::submit("Add", ['class' => 'btn btn-success']) !!}
        </div>
        
        <hr width="80%">
        <a href="{{ route('motors.index') }}" class="btn btn-info">Back</a>  
        {!! Form::close() !!}

@endsection