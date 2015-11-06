@extends('app')
@section('content')
@include('partials.alerts.errors')

@if( !count($brackets) )                                    
    <div class="alert alert-warning" role="alert">You have no Bracket Types yet. <a href="{{url('brackets/create')}}">Create new record</a></div>                                    
@else

<div class="btn-toolbar pull-right" role="toolbar">
    <a href="{{url('brackets/create')}}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Add</button></a>
</div>

    @foreach($brackets as $bracket)
        <h3>Bracket Type: {{ $bracket->bracket_type }}</h3>
        <p>
            <a href="{{ route('brackets.show', $bracket->id) }}" class="btn btn-info">View</a>
            <a href="{{ route('brackets.edit', $bracket->id) }}" class="btn btn-primary">Edit</a>
        </p>
        <hr width="80%">
    @endforeach

@endif

@endsection