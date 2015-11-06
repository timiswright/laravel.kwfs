@extends('app')
@section('content')
@include('partials.alerts.errors')

@if( !count($customers) )                                    
    <div class="alert alert-warning" role="alert">You have no customers yet. You better go find some!! <a href="{{url('customers/create')}}">Create new record</a></div>                                    
@else

<div class="btn-toolbar pull-right" role="toolbar">
    <a href="{{url('customers/create')}}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>  Add</button></a>
</div>

<span class="span3">
{!! Form::open(array('method' => 'GET', 'route' => 'customer.search')) !!}
    {!! Form::text('search', null,
                           array('required',
                                'class'=>'form-control input-sm',
                                'placeholder'=>'Search...')) !!}
     {!! Form::submit('Search', 
                            array('class'=>'btn btn-default hidden')) !!}
 {!! Form::close() !!}
</span>

<div class="table-responsive">
<table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Company</th>
          <th>Last Name</th>
          <th>First Name</th>
          <th>Phone</th>
          <th>Mobile</th>
        </tr>
      </thead>
      <tbody>
      @foreach($customers as $customer)
        <tr>
          <th scope="row"><a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info">{{ $customer->id }}</a></th>
          <td>{{ $customer->company }}</td>
          <td>{{ $customer->lname }}</td>
          <td>{{ $customer->fname }}</td>
          <td>{{ $customer->phone }}</td>
          <td>{{ $customer->mobile }}</td>
        </tr>
      @endforeach      
      </tbody>
</table>
</div>
@endif

@endsection