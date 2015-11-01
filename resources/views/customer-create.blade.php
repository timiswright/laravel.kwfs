@extends('app')
​
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 330px;
      }
.controls {
  margin-top: 10px;
  border: 1px solid transparent;
  border-radius: 2px 0 0 2px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  height: 32px;
  outline: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}
​
#pac-input {
  background-color: #fff;
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
  margin-left: 12px;
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  width: 300px;
}
​
#pac-input:focus {
  border-color: #4d90fe;
}
​
.pac-container {
  font-family: Roboto;
}
​
#type-selector {
  color: #fff;
  background-color: #4d90fe;
  padding: 5px 11px 0px 11px;
}
​
#type-selector label {
  font-family: Roboto;
  font-size: 13px;
  font-weight: 300;
}
​
    </style>
    <title>Places Searchbox</title>
    <style>
      #target {
        width: 345px;
      }
    </style>
​
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">New Record</div>
​
        <div class="panel-body">
                                    
                                    
​
<form class="form-horizontal" method="POST" action="{{url('customer')}}">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="text" name="latlng" id="latlng" value="">
  <div class="form-group">
      
    <label for="title" class="col-sm-1 control-label">Title</label>
    <div class="col-sm-3">
      <select class="form-control" id="title" name="title">
        <option value="Mr">Mr</option>
        <option value="Mrs">Mrs</option>
        <option value="Ms">Ms</option>
        <option value="Dr">Dr</option>
      </select>
    </div>
    
    <label for="fname" class="col-sm-1 control-label">Name</label>
    <div class="col-sm-3">
        <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
    </div> 
    
    <label for="lname" class="col-sm-1 control-label">Surname</label>
    <div class="col-sm-3">
        <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
    </div>      
    
  </div>
    
  <div class="form-group">
      
    <label for="street" class="col-sm-1 control-label">Street</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" id="street" name="street" placeholder="Street">
    </div>
    
    <label for="town" class="col-sm-1 control-label">Town</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" id="town" name="town" placeholder="Town">
    </div> 
       
    
  </div> 
    
  <div class="form-group">
      
    <label for="postcode" class="col-sm-1 control-label">Postcode</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Postcode">
    </div>
    
    <label for="email" class="col-sm-1 control-label">Email</label>
    <div class="col-sm-5">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
    </div> 
        
    
  </div>     
    
    
  <div class="form-group">
      
    <label for="phone" class="col-sm-1 control-label">Phone</label>
    <div class="col-sm-5">
        <input type="phone" class="form-control" id="phone" name="phone" placeholder="Phone">
    </div>
    
    <label for="mobile" class="col-sm-1 control-label">Mobile</label>
    <div class="col-sm-5">
        <input type="phone" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
    </div> 
        
    
  </div>     
    
    
  <div class="form-group">
      
    <label for="machine" class="col-sm-1 control-label">Machine</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" id="machine" name="machine" placeholder="Machine">
    </div>
    
    <label for="machineType" class="col-sm-1 control-label">Type</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" id="machineType" name="machineType" placeholder="Machine Type">
    </div> 
        
    
  </div>  
    
    
  <div class="form-group">
      
    <label for="serialNumber" class="col-sm-1 control-label"> No</label>
    <div class="col-sm-5">
        <input type="text" class="form-control" id="serialNumber" name="serialNumber" placeholder="Serial Number">
    </div>
​
        
    
  </div>      
    
    
  <div class="form-group">    
    
  <input id="pac-input" class="controls" type="text" placeholder="Search Box">
    <div id="map"></div>    
 </div>
​
  <div class="form-group">
    <div class="col-sm-offset-10 col-sm-2">
      <button type="submit" class="btn btn-default">Save</button>
    </div>
  </div>
</form>   
                                
                                
                                
                                
                                </div>
      </div>
    </div>
  </div>
</div>
​
<script>
var marker = false;

function initAutocomplete() {
 var map = new google.maps.Map(document.getElementById('map'), {
   center: {lat: 51.45400691005981, lng: -0.1318359375},
   zoom: 10,
   mapTypeId: google.maps.MapTypeId.ROADMAP
 });


google.maps.event.addListener(map, 'click', function(event) {
         if(typeof event.latLng.lat() === 'undefined' ){
           alert('Unable to get Coordinates.');
       }else{
          
          
       
    var geocoder = new google.maps.Geocoder;

      
       var points = {lat: parseFloat(event.latLng.lat()), lng: parseFloat(event.latLng.lng())};
       document.getElementById("latlng").value = JSON.stringify(points);  
     

    if(marker){ 
            marker.setMap(null);
            marker = false;
    }    


    geocoder.geocode({'location': points}, function(results, status) {


       if (status === google.maps.GeocoderStatus.OK) {


         if (results[1]) {

           marker = new google.maps.Marker({
             position: event.latLng,
             map: map,
             maxWidth: 400
           });

           var content = '';
           var place = results[0].address_components.slice(1, results[0].address_components.length+1);


          
           place.forEach(function(value, key) {
                   content+= value.long_name+'<br>';
                  
                   
               switch(value.types[0]) {
                   case "route":
                       document.getElementById("street").value = value.long_name;
                       break;
                   case "postal_town":
                       document.getElementById("town").value = value.long_name;
                       break;
                       
                   case "postal_code":
                       document.getElementById("postcode").value = value.long_name;
                       break;
                       
               }                    
                   
                   
                 });


           var infoWindow = new google.maps.InfoWindow({});               
           infoWindow.setContent(content);
           infoWindow.open(map, marker);
           map.panTo(event.latLng);

         } else {
           window.alert('No results found');
         }
       } else {
         window.alert('Geocoder failed due to: ' + status);
       }

     });  


 
          
       }
 });


 // Create the search box and link it to the UI element.
 var input = document.getElementById('pac-input');
 var searchBox = new google.maps.places.SearchBox(input);
 map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

 // Bias the SearchBox results towards current map's viewport.
 map.addListener('bounds_changed', function() {
   searchBox.setBounds(map.getBounds());
 });

 var markers = [];
 // [START region_getplaces]
 // Listen for the event fired when the user selects a prediction and retrieve
 // more details for that place.
 searchBox.addListener('places_changed', function() {
   var places = searchBox.getPlaces();

   if (places.length == 0) {
     return;
   }

   // Clear out the old markers.
   markers.forEach(function(marker) {
     marker.setMap(null);
   });
   markers = [];

   // For each place, get the icon, name and location.
   var bounds = new google.maps.LatLngBounds();
   places.forEach(function(place) {
     var icon = {
       url: place.icon,
       size: new google.maps.Size(71, 71),
       origin: new google.maps.Point(0, 0),
       anchor: new google.maps.Point(17, 34),
       scaledSize: new google.maps.Size(25, 25)
     };

     // Create a marker for each place.
     markers.push(new google.maps.Marker({
       map: map,
       icon: icon,
       title: place.name,
       position: place.geometry.location
     }));

     if (place.geometry.viewport) {
       // Only geocodes have viewport.
       bounds.union(place.geometry.viewport);
     } else {
       bounds.extend(place.geometry.location);
     }
   });
   map.fitBounds(bounds);


 });
 // [END region_getplaces]
}


   </script>
​
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBC-k-Uwj6Fkbg1p9TurD_SJZJF58aWm9o&libraries=places&callback=initAutocomplete"></script>
@endsection