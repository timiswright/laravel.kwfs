@extends('app')
@section('content')
@include('partials.alerts.errors')

{!! Form::model($customer, [
    'method' => 'PATCH',
    'route' => ['customers.update', $customer['id']],
    'class' => 'form-horizontal'
]) !!}                                 
​
{!! Form::token() !!}
{!! Form::hidden('latlng', null, ['id' => 'latlng']) !!}
  @include('customers._form')
{!! Form::close() !!}

@include('partials.mapsjs._edit')
@endsection