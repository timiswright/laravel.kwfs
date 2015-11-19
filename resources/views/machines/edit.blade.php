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
            

            <div class="form-group @if($errors->first('measurement1')) has-error @endif">
            {!! Form::label('measurement1', 'Main Auger Measurement') !!}
            {!! Form::text('measurement1', $machine->measurement1, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('measurement1') }}</small>
        </div>

        <div class="form-group @if($errors->first('measurement2')) has-error @endif">
            {!! Form::label('measurement2', 'Second Auger Measurement') !!}
            {!! Form::text('measurement2', $machine->measurement2, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('measurement2') }}</small>
        </div>

        @if(isset($machine->id))
        <div>
            <hr width="80%">
        </div>

        <div>
            <a href="/machines/{{$machine->id}}/edit/move" class="btn btn-danger">Move Machine</a>
        </div>
        @endif

    </div>
    <div class="col-md-1">
        &nbsp;
    </div>
    <div class="row col-md-12">
        <div class="form-group @if($errors->first('notes')) has-error @endif">
            {!! Form::label('notes', 'Extra Notes') !!}
            {!! Form::textarea('notes', null, ['class' => 'form-control', 'rows' => '5']) !!}
            <small class="text-danger">{{ $errors->first('notes') }}</small>
        </div>
    </div>
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