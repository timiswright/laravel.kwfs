@extends('app')
@section('content')
@include('partials.alerts.errors')

@if( !count($augers) )                                    
    <div class="alert alert-warning" role="alert">You have no Auger Types yet. <a href="{{url('augers/create')}}">Create new record</a></div>                                    
@else

<div class="btn-toolbar pull-right" role="toolbar">
    <a href="{{url('augers/create')}}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Add</button></a>
</div>

    @foreach($augers as $auger)
        <h3>Auger Type: {{ $auger->auger_type }}</h3>
        <p></p>
        <p>
            <a href="{{ route('augers.show', $auger->id) }}" class="btn btn-info">View</a>
            <a href="{{ route('augers.edit', $auger->id) }}" class="btn btn-primary">Edit</a>
        </p>
        <hr>
    @endforeach

@endif

@endsection