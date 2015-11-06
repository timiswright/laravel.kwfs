@extends('app')
@section('content')
@include('partials.alerts.errors')

<h1>Motor Type: {{ $motor->motor_type }} </h1>
<hr>
<a href="{{ route('motors.index') }}" class="btn btn-info">Back</a>
<a href="{{ route('motors.edit', $motor->id) }}" class="btn btn-primary">Edit</a>

    <div class="pull-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['motors.destroy', $motor->id]
        ]) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>

@endsection