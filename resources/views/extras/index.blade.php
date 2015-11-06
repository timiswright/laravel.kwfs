@extends('app')
@section('content')
@include('partials.alerts.errors')

@if( !count($extras) )                                    
    <div class="alert alert-warning" role="alert">You have no Extra Types yet. <a href="{{url('extras/create')}}">Create new record</a></div>                                    
@else

<div class="btn-toolbar pull-right" role="toolbar">
    <a href="{{url('extras/create')}}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Add</button></a>
</div>

    @foreach($extras as $extra)
    <h3>Extra Type: {{ $extra->extra_type }} - Extra Value: {{ $extra->extra_value }}</h3>
    <p>
        <a href="{{ route('extras.show', $extra->id) }}" class="btn btn-info">View</a>
        <a href="{{ route('extras.edit', $extra->id) }}" class="btn btn-primary">Edit</a>
    </p>
    <hr>
    @endforeach

@endif

@endsection