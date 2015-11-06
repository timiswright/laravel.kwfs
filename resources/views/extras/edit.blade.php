@extends('app')
@section('content')
@include('partials.alerts.errors')

<div class="btn-toolbar pull-right" role="toolbar">
    <a href="{{url('extras/create')}}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Add</button></a>
</div>

<h1>Editing "{{ $extra->extra_type }}"</h1>

{!! Form::model($extra, [
    'method' => 'PATCH',
    'route' => ['extras.update', $extra->id]
]) !!}

        <div class="form-group">
            {!! Form::label('extra_type', 'Extra Type') !!}
            {!! Form::text('extra_type', $extra->extra_type , ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('extra_type') }}</small>
        </div>

        <div class="form-group">
            {!! Form::label('extra_value', 'Extra Value') !!}
            {!! Form::text('extra_value', $extra->extra_value , ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('extra_value') }}</small>
        </div>

<hr width="80%">
<a href="{{ route('extras.index') }}" class="btn btn-info">Back</a>
{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}

@endsection