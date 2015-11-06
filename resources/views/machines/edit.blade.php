@extends('app')
@section('content')
@include('partials.alerts.errors')

<div class="panel-body">
            {!! Form::model($machine, ['method' => 'PATCH','route' => ['machines.update', $machine->id]]) !!}
            {!! Form::token() !!}
            {!! Form::hidden('customer_id', null) !!}
            {!! Form::hidden('machine_type', 'value') !!}
        <div class="row col-md-12">
            @include('machines._form')
        <div class="row col-md-12">    
            <hr width="80%">
                <div class="btn-group pull-left">
                    <a href="{{ route('machines.index') }}" class="btn btn-info">Back</a>
                </div>
                <div class="btn-group pull-right">
                    {!! Form::submit("Save", ['class' => 'btn btn-primary']) !!}
                </div>
        </div>
    {!! Form::close() !!}      
</div>
@endsection