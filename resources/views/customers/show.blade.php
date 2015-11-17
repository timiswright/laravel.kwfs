@extends('app')
@section('content')
@include('partials.alerts.errors')

<style>
  #map {
      height: 400px;
  }
  h2, h4{
    margin-top: 3px;
    margin-bottom: 5px;
  }
</style>
        
        <div class="col-md-4">
            Customer:
            <table class="table table-sm borderless">
                  <thead>
                      <tr><td><h2>{{ $customer->company }}</h2></td></tr>
                      <tr><td><h4>{{ $customer->fname }} {{ $customer->lname }}</h4></td></tr>
                      <tr><td><h4>Phone: {{ $customer->phone }}</h4></td></tr>
                      <tr><td><h4>Mobile: {{ $customer->mobile }}</h4></td></tr>
                      <tr><td><h4>Email: {{ $customer->email }}</h4></td></tr>
                  </thead>
            </table>
            </div>

            <div class="col-md-4">
            Address:
            <table class="table table-sm borderless">
                  <thead>
                      <tr><td><h4>{{ $customer->building }}</h4></td></tr>
                      <tr><td><h4>{{ $customer->street }}</h4></td></tr>
                      <tr><td><h4>{{ $customer->town }}</h4></td></tr>
                      <tr><td><h4>{{ $customer->city }}</h4></td></tr>
                      <tr><td><h4>{{ $customer->county }}</h4></td></tr>
                      <tr><td><h4>{{ $customer->postcode }}</h4></td></tr>
                  </thead>
            </table>
            </div>
        
            <div class="col-md-4">
            <div class="btn-toolbar pull-right" role="toolbar">
                <a href="{{ URL::route('machines.create', array('customer_id' => $customer->id)) }}">
                    <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span> Add</a></button>
            </div>

            Machines:
            <table class="table table-sm table-striped">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Serial:</th>
                      <th>Type:</th>
                      <th>Bracket:</th>
                      <th>Sold Date:</th>
                    </tr>
                  </thead>
                  <tbody>  
                @foreach($filteredMachines as $machine)
                    <tr>
                      <th scope="row"></th>
                      <td><a href="/machines/{{$machine['id']}}" class="btn btn-info">{{$machine['serial']}}</a></td>
                      <td>{{$machine['bucket_type']}}</td>
                      <td>{{$machine['bracket_type']}}</td>
                      <td>{{ $machine['sold_date'] }}</td>
                    </tr>
                @endforeach
                </tbody>
                </table>
            </div>
      
        <div class="row col-md-12">
            <hr width="80%">
        </div>
        
{!! Form::model($customer, [
    'method' => 'PATCH',
    'route' => ['customers.update', $customer['id']],
    'class' => 'form-horizontal'
]) !!}                                 
​
{!! Form::token() !!}
  <div class="row col-md-12">
    <div class="row">
      <div class="col-sm-1">&nbsp;</div>
      <div class="col-sm-1">
        {!! Form::label('notes', 'Notes:', ['class' => 'col-sm-1 control-label']) !!}
      </div>
      <div class="col-sm-8">
        {!! Form::textarea('notes', $customer->notes, ['class' => 'form-control', 'placeholder' => 'Notes', 'rows' => '5']) !!}
      </div>
      {!! Form::submit('Update', ['class' => 'btn btn-warning']) !!}
    </div>
  </div>
{!! Form::close() !!}

        <div class="row col-md-12">
            <hr width="80%">
        </div>

        <div class="row col-md-12">
            <div class="form-group">    
                <div id="map"></div>    
            </div>
        </div>
        <div class="row col-md-12">
            <hr width="80%">
        </div>
      
        <div class="row col-md-12">
            <a href="{{ route('customers.index') }}" class="btn btn-info">Back</a>
            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary">Edit</a>
            <div class="pull-right">
                    {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['customers.destroy', $customer->id]
                    ]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
            </div>
        </div>
    </div>

@include('partials.mapsjs._show')

@endsection