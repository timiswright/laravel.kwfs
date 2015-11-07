<script>
// all we need to pass in is a toJson array containing the latlng company fname lname as record.

//$customer = Customer::find($id);
//  $data = [
//    'record' => $customer->toJson(),
//    'customer' => $customer->toArray()
//    ];
//return view('customers.edit', $data);

var marker = false;
var customer = {!!$record!!}

function initAutocomplete() {
var map = new google.maps.Map(document.getElementById('map'), {
   center: JSON.parse(customer.latlng),
   zoom: 16,
   mapTypeId: google.maps.MapTypeId.ROADMAP
 });

var infowindow = new google.maps.InfoWindow({
  content: customer.company+'<br />'+customer.fname+' '+customer.lname+'<br>'+customer.postcode
});    
   
var marker = new google.maps.Marker({
  position: JSON.parse(customer.latlng),
  map: map,
  title: customer.company+'<br />'+customer.fname+' '+customer.lname
});
     
marker.addListener('click', function() {
  infowindow.open(map, marker);
});      

marker.setMap(map);

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
                       
                   case "locality":
                       document.getElementById("town").value = value.long_name;
                       break;
                       
                  case "postal_town":
                  //somehow i need to see if the postal_town.value.long_name is the same as administrative_area_level_2 and if they are not show one of them
                       document.getElementById("city").value = value.long_name;
                       break;

                  case "administrative_area_level_2":
                       document.getElementById("county").value = value.long_name;
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
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ env('MAPS_API') }}&libraries=places&callback=initAutocomplete"></script>