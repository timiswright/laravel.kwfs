@extends('app')
@section('content')
@include('partials.alerts.errors')


<span class="span3">
{!! Form::open(array('method' => 'PATCH', 'route' => 'machines.moveMachineSave')) !!}
{!! Form::token() !!}
{!! Form::hidden('id', $machine->id) !!}

</span>
<div class="row col-md-12">
  <div class="table-responsive">
    <table class="table table-sm table-striped">
      <tbody>
        <tr>
          <th>#</th>
          <th>Serial No.</th>
          <th>Customer Id</th>
          <th>NEW CUSTOMER</th>

        </tr>

        <tr>
            <th scope="row"><a href="#" class="btn btn-info">{{ $machine->id }}</a></th>
            <td><b>{{ $machine->serial }}</b></td>
            <td>{{ $machine->customer->company }} - {{ $machine->customer->building }}</td>
            <td>
              <div class="form-group @if($errors->first('customer_id')) has-error @endif">
                  {!! Form::select('customer_id', $customers, $machine->customer_id, ['id' => 'customer_id', 'class' => 'form-control']) !!}
                  <small class="text-danger">{{ $errors->first('customer_id') }}</small>

              </div>
              <div>
                {!! Form::submit('Transfer', ['class' => 'btn btn-warning pull-right']) !!}
              </div>
            </td>
         </tr> 
      </tbody>
    </table>
  </div>
</div>
 {!! Form::close() !!}
@endsection