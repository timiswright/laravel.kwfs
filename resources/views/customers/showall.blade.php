@extends('app')
@section('content')
@include('partials.alerts.errors')

<style>
  #map {
    min-height: 800px;
  }
</style>
<a href="{!! URL::current() !!}/fullscreen"><button type="button" class="btn btn-default"><span class="glyphicon glyphicon-resize-full" aria-hidden="true"></span>  Full Screen</button></a>
<input id="pac-input" class="controls" type="text" placeholder="Search Box">     
    <div id="map"></div>    
​@include('partials.mapsjs._showall')
@endsection
