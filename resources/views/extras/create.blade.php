@extends('app')
@section('content')
@include('partials.alerts.errors')

    {!! Form::open(['method' => 'POST', 'route' => 'extras.store', 'class' => 'form-horizontal']) !!}
    {!! Form::token() !!}
                
            <div class="form-group">
                {!! Form::label('extra_type', 'Extra Type') !!}
                {!! Form::text('extra_type', null, ['class' => 'form-control', 'required' => 'required', 'autofocus'=>'autofocus']) !!}
                <small class="text-danger">{{ $errors->first('extra_type') }}</small>
            </div>

            <div class="form-group">
                {!! Form::label('extra_value', 'Extra Value') !!}
                {!! Form::text('extra_value', null, ['class' => 'form-control', 'required' => 'required', 'autofocus'=>'autofocus']) !!}
                <small class="text-danger">{{ $errors->first('extra_value') }}</small>
            </div>
            
            <hr width="80%">
            <a href="{{ route('extras.index') }}" class="btn btn-info">Back</a>
            <div class="btn-group pull-right">
                {!! Form::submit("Add", ['class' => 'btn btn-success']) !!}
            </div>
    <hr width="80%">       
    {!! Form::close() !!}

    <div class="col-md-12">
        
            @foreach ($extras as $extra_type => $extra_value)
            <div class="col-md-4">
        <table class="table table-sm table-striped">
          <tbody>
          <tr>
              <td>{{ $extra_type }}</td>
            </tr>
            <tr>
                <td>{!! implode(', ', $extra_value) !!}
                </td>
            </tr>
            </tbody>
        </table>
        </div>
            @endforeach
          
    </div>



@endsection