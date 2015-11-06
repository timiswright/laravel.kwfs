@extends('app')
@section('content')
@include('partials.alerts.errors')

<div class="btn-toolbar pull-right" role="toolbar">
    <a href="{{url('motors/create')}}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Add</button></a>
</div>

<h1>Editing "{{ $motor->motor_type }}"</h1>

{!! Form::model($motor, [
    'method' => 'PATCH',
    'route' => ['motors.update', $motor->id]
]) !!}

    <div class="form-group">
        {!! Form::label('motor_type', 'Motor Type') !!}
        {!! Form::text('motor_type', $motor->motor_type , ['class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('motor_type') }}</small>
    </div>

<hr width="80%">
<a href="{{ route('motors.index') }}" class="btn btn-info">Back</a>
{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}

@endsection