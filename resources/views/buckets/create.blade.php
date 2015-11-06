@extends('app')
@section('content')
@include('partials.alerts.errors')

    {!! Form::open(['method' => 'POST', 'route' => 'buckets.store', 'class' => 'form-horizontal']) !!}
    {!! Form::token() !!}
    
        <div class="form-group">
            {!! Form::label('bucket_type', 'Bucket Type') !!}
            {!! Form::text('bucket_type', null, ['class' => 'form-control', 'required' => 'required', 'autofocus'=>'autofocus']) !!}
            <small class="text-danger">{{ $errors->first('bucket_type') }}</small>
        </div>
    
        <hr width="80%">
        <a href="{{ route('buckets.index') }}" class="btn btn-info">Back</a>
        <div class="btn-group pull-right">
            {!! Form::submit("Add", ['class' => 'btn btn-success']) !!}
        </div>
    {!! Form::close() !!}

@endsection