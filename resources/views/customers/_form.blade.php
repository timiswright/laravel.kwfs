<div class="form-group">
  <div class="col-sm-12">
    {!! Form::label('company', 'Company:', ['class' => 'col-sm-1 control-label bold']) !!}
    <div class="col-sm-3">
        {!! Form::text('company', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('company') }}</small>
    </div>

    {!! Form::label('fname', 'First&nbsp;Name:', ['class' => 'col-sm-1 control-label bold']) !!}
    <div class="col-sm-3">
        {!! Form::text('fname', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('fname') }}</small>
    </div>
  
    {!! Form::label('lname', 'Surname:', ['class' => 'col-sm-1 control-label bold']) !!}
    <div class="col-sm-3">
        {!! Form::text('lname', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('lname') }}</small>
    </div>
  </div>     
</div>

<div class="row">
  <div class="col-sm-6 ">
    <b>Address:</b>
    <div class="row">
      <div class="col-sm-2">
        {!! Form::label('building', 'Building:', ['class' => 'col-sm-1 control-label']) !!}</div>
      <div class="col-sm-8">
        {!! Form::text('building', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('building') }}</small>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-2">
        {!! Form::label('street', 'Street:', ['class' => 'col-sm-1 control-label']) !!}
      </div>
      <div class="col-sm-8">
        {!! Form::text('street', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('street') }}</small>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-2">
        {!! Form::label('town', 'Town:', ['class' => 'col-sm-1 control-label']) !!}
      </div>
      <div class="col-sm-8">
        {!! Form::text('town', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('town') }}</small>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-2">
        {!! Form::label('city', 'City:', ['class' => 'col-sm-1 control-label']) !!}
      </div>
      <div class="col-sm-8">
        {!! Form::text('city', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('city') }}</small>
      </div>
    </div>

     <div class="row">
      <div class="col-sm-2">
        {!! Form::label('county', 'County:', ['class' => 'col-sm-1 control-label']) !!}
      </div>
      <div class="col-sm-8">
        {!! Form::text('county', null, ['class' => 'form-control']) !!}
        <small class="text-danger">{{ $errors->first('county') }}</small>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-2">
        {!! Form::label('postcode', 'Postcode:', ['class' => 'col-sm-1 control-label']) !!}
      </div>
      <div class="col-sm-8">
        {!! Form::text('postcode', null, ['class' => 'form-control', 'placeholder' => 'Postcode']) !!}
        <small class="text-danger">{{ $errors->first('postcode') }}</small>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <b>Contact Details:</b>
    <div class="row">
      <div class="col-sm-2">
        {!! Form::label('email', 'Email:', ['class' => 'col-sm-1 control-label']) !!}
      </div>
      <div class="col-sm-8">
        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'email']) !!}
        <small class="text-danger">{{ $errors->first('email') }}</small>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-2">
        {!! Form::label('phone', 'Phone:', ['class' => 'col-sm-1 control-label']) !!}
      </div>
      <div class="col-sm-8">
        {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone Number']) !!}
          <small class="text-danger">{{ $errors->first('phone') }}</small>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-2">
        {!! Form::label('mobile', 'Mobile:', ['class' => 'col-sm-1 control-label']) !!}
      </div>
      <div class="col-sm-8">
        {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => 'Mobile']) !!}
          <small class="text-danger">{{ $errors->first('mobile') }}</small>
      </div>
    </div>
  </div>
</div>

<hr width="80%"> 
  <div class="form-group">     
    <input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id="map"></div>    
  </div>

  <div class="form-group">
    <div class="col-sm-2">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
</form>
<hr width="90%">