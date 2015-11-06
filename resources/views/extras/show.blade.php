@extends('app')
@section('content')
@include('partials.alerts.errors')

<div class="btn-toolbar pull-right" role="toolbar">
    <a href="{{url('extras/create')}}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Add</button></a>
</div>

<h1>Extra Type: {{ $extra->extra_type }} - Extra Value: {{ $extra->extra_value }} </h1>
<hr>
<a href="{{ route('extras.index') }}" class="btn btn-info">Back</a>
<a href="{{ route('extras.edit', $extra->id) }}" class="btn btn-primary">Edit</a>

    <div class="pull-right">
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['extras.destroy', $extra->id]
        ]) !!}
        
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>

@endsection