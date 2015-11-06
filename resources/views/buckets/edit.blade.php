@extends('app')
@section('content')
@include('partials.alerts.errors')

<div class="btn-toolbar pull-right" role="toolbar">
    <a href="{{url('buckets/create')}}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Add</button></a>
</div>

<h1>Editing "{{ $bucket->bucket_type }}"</h1>

{!! Form::model($bucket, [
    'method' => 'PATCH',
    'route' => ['buckets.update', $bucket->id]
]) !!}

        <div class="form-group">
        <div 
            {!! Form::label('bucket_type', 'Bucket Type') !!}
            {!! Form::text('bucket_type', $bucket->bucket_type , ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('bucket_type') }}</small>
        </div>

<hr width="80%">
<a href="{{ route('buckets.index') }}" class="btn btn-info">Back</a>
{!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
 
@endsection