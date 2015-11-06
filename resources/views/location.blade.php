@extends('app')
@section('content')
@include('partials.alerts.errors')

<style> 
  #map {
    min-height: 800px;
  }
</style>

<a href="{{url('fullscreen')}}"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-resize-full" aria-hidden="true"></span>  Full Sceen</button></a>

<br />
<div class="form-group">    
    <div id="map"></div>    
</div>
@include('partials.mapsjs._restricted')
@endsection