<div class="col-md-6">
        <div class="form-group @if($errors->first('serial')) has-error @endif">
            {!! Form::label('serial', 'Serial Number') !!}
            {!! Form::text('serial', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('serial') }}</small>
        </div>
    <div class="form-group @if($errors->first('sold_date')) has-error @endif">
            {!! Form::label('sold_date', 'Sold Date') !!}
            {!! Form::date('sold_date', Carbon\Carbon::now(), ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('sold_date') }}</small>
    </div>
    <div class="form-group @if($errors->first('invoice')) has-error @endif">
            {!! Form::label('invoice', 'Invoice No.') !!}
            {!! Form::text('invoice', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('invoice') }}</small>
    </div>
    <div class="form-group">
            {!! Form::label('bucket_id', 'Bucket Type') !!}
            {!! Form::select('bucket_id', $buckets, null, 
            [
                'class' => 'form-control', 
                'required' => 'required',
                'placeholder' => 'Please select the bucket size'
            ]) !!}
            <small class="text-danger">{{ $errors->first('bucket_id') }}</small>
        </div>
    <div class="form-group">
            {!! Form::label('bracket_id', 'Bracket Type') !!}
            {!! Form::select('bracket_id', $brackets, null, 
            [
                'class' => 'form-control', 
                'required' => 'required',
                'placeholder' => 'Please select the brackets that are fitted'
            ]) !!}
            <small class="text-danger">{{ $errors->first('bracket_id') }}</small>
        </div>
    <div class="form-group">
            {!! Form::label('auger_id', 'Auger Type') !!}
            {!! Form::select('auger_id', $augers, null, 
            [
                'class' => 'form-control', 
                'required' => 'required',
                'placeholder' => 'Please select the auger that is fitted'
            ]) !!}
            <small class="text-danger">{{ $errors->first('auger_id') }}</small>
        </div>
    <div class="form-group">
            {!! Form::label('motor_id', 'Motor Type') !!}
            {!! Form::select('motor_id', $motors, null, 
            [
                'class' => 'form-control', 
                'required' => 'required',
                'placeholder' => 'Please select the motor that is fitted'
            ]) !!}
            <small class="text-danger">{{ $errors->first('motor_id') }}</small>
        </div>
    </div>
        <div class="col-md-1">
        &nbsp;
    </div>
    <div class="col-md-4">
        <table class="table table-sm table-striped">
          <tbody>
            @foreach ($extras as $type => $list)
            <tr>
              <td>{!! Form::label('extras-'.str_slug($type), $type) !!}</td>
              <td>{!! Form::select('extras[]', collect($list)->lists('extra_value', 'id'), null, ['id' => 'extras-'.str_slug($type)]) !!}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
    <div class="col-md-1">
        &nbsp;
    </div>
    <div class="row col-md-12">
        <div class="form-group @if($errors->first('notes')) has-error @endif">
            {!! Form::label('notes', 'Extra Notes') !!}
            {!! Form::textarea('notes', null, ['class' => 'form-control', 'required' => 'required']) !!}
            <small class="text-danger">{{ $errors->first('notes') }}</small>
        </div>
    </div>

    