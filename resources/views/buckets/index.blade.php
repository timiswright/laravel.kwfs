@extends('app')
@section('content')
@include('partials.alerts.errors')

@if( !count($buckets) )                                    
    <div class="alert alert-warning" role="alert">You have no Bucket Types yet. <a href="{{url('buckets/create')}}">Create new record</a></div>                                    
@else

<div class="btn-toolbar pull-right" role="toolbar">
    <a href="{{url('buckets/create')}}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Add</button></a>
</div>

    @foreach($buckets as $bucket)
        <h3>Bucket Type: {{ $bucket->bucket_type }}</h3>
        <p>
            <a href="{{ route('buckets.show', $bucket->id) }}" class="btn btn-info">View</a>
            <a href="{{ route('buckets.edit', $bucket->id) }}" class="btn btn-primary">Edit</a>
        </p>
        <hr>
    @endforeach

@endif

@endsection