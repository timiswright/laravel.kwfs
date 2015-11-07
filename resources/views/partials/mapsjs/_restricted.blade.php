<script>
var map;
var markers = [];
var customers = {!!$customers!!}

function initAutocomplete() {
  map = new google.maps.Map(document.getElementById('map'), {
   center: {lat: 51.45400691005981, lng: -0.1318359375},
   zoom: 3,
   minZoom: 1, // Minimum zoom level allowed (0-20)
   maxZoom: 7, // Maximum soom level allowed (0-20)
   mapTypeId: google.maps.MapTypeId.ROADMAP
 });

  customers.forEach(function(cust){
      var infowindow = new google.maps.InfoWindow({
        content: cust.town+'<br>'+cust.city
      });    
   
      var marker = new google.maps.Marker({
        position: JSON.parse(cust.latlng),
        map: map,
        company: cust.town+'<br>'+cust.city
      });

      marker.addListener('click', function() {
       infowindow.open(map, marker);
      });
    marker.setMap(map);
  });
}
</script>

<script async defer
      src="https://maps.googleapis.com/maps/api/js?key={{ env('MAPS_API') }}&libraries=places&callback=initAutocomplete">
</script>