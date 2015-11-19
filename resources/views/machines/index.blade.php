@extends('app')
@section('content')
@include('partials.alerts.errors')

@if( !count($filteredMachines) )                                    
    <div class="alert alert-warning" role="alert">No Matches  </div>                                    
@else

<span class="span3">
{!! Form::open(array('method' => 'GET', 'route' => 'machine.search')) !!}
    {!! Form::text('search', null,
                           array('required',
                                'class'=>'form-control input-sm',
                                'placeholder'=>'Search...')) !!}
     {!! Form::submit('Search', 
                            array('class'=>'btn btn-default hidden')) !!}
 {!! Form::close() !!}
</span>

<div class="row col-md-12">
  <div class="table-responsive">
    <table class="table table-sm table-striped">
      <tbody>
        <tr>
          <th>#</th>
          <th>Serial No.</th>
          <th>Bucket</th>
          <th>Bracket</th>
          <th>Customer</th>
        </tr>
        @foreach($filteredMachines as $machine)
        <tr>
            <th scope="row"><a href="{{ route('machines.show', $machine['id']) }}" class="btn btn-info">{{ $machine['id'] }}</a></th>
            <td><b>{{ $machine['serial'] }}</b></td>
            <td>{{ $machine['bucket_type'] }}</td>
            <td>{{ $machine['bracket_type'] }}</td>
            <td>{{ $machine['company'] }}</td>
         </tr>
        @endforeach  
      </tbody>
    </table>
  </div>
</div>
@endif
@endsection