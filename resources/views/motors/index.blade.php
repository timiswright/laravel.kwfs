@extends('app')
@section('content')
@include('partials.alerts.errors')

@if( !count($motors) )                                    
    <div class="alert alert-warning" role="alert">You have no Motor Types yet. <a href="{{url('motors/create')}}">Create new record</a></div>                                    
@else

<div class="btn-toolbar pull-right" role="toolbar">
    <a href="{{url('motors/create')}}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Add</button></a>
</div>

    @foreach($motors as $motor)
        <h3>Motor Type: {{ $motor->motor_type }}</h3>
        <p>
            <a href="{{ route('motors.show', $motor->id) }}" class="btn btn-info">View</a>
            <a href="{{ route('motors.edit', $motor->id) }}" class="btn btn-primary">Edit</a>
        </p>
        <hr>
    @endforeach
@endif

@endsection