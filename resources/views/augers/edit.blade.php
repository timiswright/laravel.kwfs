@extends('app')
@section('content')
@include('partials.alerts.errors')

<div class="btn-toolbar pull-right" role="toolbar">
    <a href="{{url('augers/create')}}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Add</button></a>
</div>

<h1>Editing "{{ $auger->auger_type }}"</h1>

{!! Form::model($auger, [
    'method' => 'PATCH',
    'route' => ['augers.update', $auger->id]
]) !!}

    <div class="form-group">
        {!! Form::label('auger_type', 'Auger Type') !!}
        {!! Form::text('auger_type', $auger->auger_type , ['class' => 'form-control', 'required' => 'required']) !!}
        <small class="text-danger">{{ $errors->first('auger_type') }}</small>
    </div>

<hr width="80%">
<a href="{{ route('augers.index') }}" class="btn btn-info">Back</a>
{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}

@endsection