@extends('app')
@section('content')
@include('partials.alerts.errors')

​{!! Form::open(['method' => 'POST', 'route' => 'customers.store', 'class' => 'form-horizontal']) !!}
{!! Form::token() !!}
{!! Form::hidden('latlng', null, ['id' => 'latlng']) !!}
  @include('customers._form')
{!! Form::close() !!}
  @include('partials.mapsjs._create')

@endsection