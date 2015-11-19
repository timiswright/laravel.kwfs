@extends('app')
@section('content')
@include('partials.alerts.errors')

<div class="row col-md-12">
    <div class="col-md-6">
        <table class="table table-sm table-striped">
          <tbody>
              <tr><td width="50%">Auger:</td><td>{{ $auger['auger_type'] }}</td></tr>
              <tr><td>Bracket:</td><td>{{ $bracket['bracket_type'] }}</td></tr>
              <tr><td>Bucket:</td><td>{{ $bucket['bucket_type'] }}</td></tr>
              <tr><td>Motor:</td><td>{{ $motor['motor_type'] }}</td></tr>
              <tr><td>Sold Date:</td><td>{{ $machine['sold_date'] }}</td></tr>
              <tr><td>Invoice Number:</td><td>{{ $machine['invoice'] }}</td></tr>
            </tr>
          </tbody>
        </table>
    </div>
    <div class="col-md-6">  
        <table class="table table-sm table-striped">
          <tbody>
            @foreach( $extras as $extra)
                <tr><td width="50%">{{ $extra['extra_type']}}:</td><td>{{ $extra['extra_value']}}</td></tr>
            @endforeach

              <tr><td width="50%">Main Auger Measurement:</td><td>{{ $machine['measurement1'] }}</td></tr>
              <tr><td>Second Auger Measurement:</td><td>{{ $machine['measurement2'] }}</td></tr>
          </tbody>
        </table>


    </div>
</div>


<div class="row col-md-12">
    <hr width="80%">
</div>

{!! Form::model($machine, [
    'method' => 'PATCH',
    'route' => ['machines.notesUpdate'],
    'class' => 'form-horizontal'
]) !!}   

{!! Form::token() !!}
  <div class="row col-md-12">
    <div class="row">
      <div class="col-sm-1">&nbsp;</div>
      <div class="col-sm-1">
        {!! Form::label('notes', 'Notes:', ['class' => 'col-sm-1 control-label']) !!}
        {!! Form::hidden('id', $machine->id) !!}
      </div>
      <div class="col-sm-8">
        {!! Form::textarea('notes', $machine->notes, ['class' => 'form-control', 'placeholder' => 'Notes', 'rows' => '5']) !!}
      </div>
      {!! Form::submit('Update', ['class' => 'btn btn-warning']) !!}
    </div>
  </div>
{!! Form::close() !!}

<div class="row col-md-12">
    <hr width="80%">
</div>


 <a href="{{ route('customers.show', $machine->customer_id) }}" class="btn btn-info">Back!!</a>
<a href="{{ route('machines.edit', $machine->id) }}" class="btn btn-primary">Edit</a>
    <div class="pull-right">  
        {!! Form::open([
            'method' => 'DELETE',
            'route' => ['machines.destroy', $machine->id]
        ]) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>

@endsection