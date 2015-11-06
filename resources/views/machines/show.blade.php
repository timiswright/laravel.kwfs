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
              @if($motor['sold_date'])
              <tr><td>Sold Date:</td><td>{{ $motor['sold_date'] }}</td></tr>
              @endif
              @if($motor['invoice'])
              <tr><td>Invoice No.:</td><td>{{ $motor['invoice'] }}</td></tr>
              @endif
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
          </tbody>
        </table>
    </div>
</div>
<hr width="80%">
<a href="{{ route('machines.index') }}" class="btn btn-info">Back</a>
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