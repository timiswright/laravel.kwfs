@extends('app')
@section('content')
@include('partials.alerts.errors')

<div class="btn-toolbar pull-right" role="toolbar">
    <a href="{{url('brackets/create')}}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Add</button></a>
</div>

<h1>Editing "{{ $bracket->bracket_type }}"</h1>

{!! Form::model($bracket, [
    'method' => 'PATCH',
    'route' => ['brackets.update', $bracket->id]
]) !!}

    <div class="form-group">
        {!! Form::label('bracket_type', 'Bracket Type') !!}
        {!! Form::text('bracket_type', $bracket->bracket_type , ['class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('bracket_type') }}</small>
    </div>

<hr width="80%">
<a href="{{ route('brackets.index') }}" class="btn btn-info">Back</a>
{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}

@endsection