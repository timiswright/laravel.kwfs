@extends('app')
@section('content')
@include('partials.alerts.errors')

<div class="panel-body">
            {!! Form::open(['method' => 'POST', 'route' => 'machines.store', 'class' => 'form-horizontal']) !!}
            {!! Form::token() !!}
            {!! Form::hidden('customer_id', $customer->id, ['class' => 'form-control', 'required' => 'required']) !!} 
        <div class="row col-md-12">
            @include('machines._form')
        <div class="row col-md-12">    
            <hr width="80%">
                <div class="btn-group pull-left">
                    <a href="{{ route('machines.index') }}" class="btn btn-info">Back</a>
                </div>
                <div class="btn-group pull-right">
                    {!! Form::submit("Add", ['class' => 'btn btn-primary']) !!}
                </div>
        </div>
    {!! Form::close() !!}      
</div>
@endsection