@extends('app')
@section('content')
@include('partials.alerts.errors')

<div class="btn-toolbar pull-right" role="toolbar">
    <a href="{{url('buckets/create')}}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Add</button></a>
</div>
<h1>Bucket Type: {{ $bucket->bucket_type }} </h1>
<hr>
<a href="{{ route('buckets.index') }}" class="btn btn-info">Back</a>
<a href="{{ route('buckets.edit', $bucket->id) }}" class="btn btn-primary">Edit</a>

<div class="pull-right">
    
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['buckets.destroy', $bucket->id]
        ]) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
 
</div>
@endsection