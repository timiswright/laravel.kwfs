<script>
// this map is only displaying a single point so need to pass record with the latlng into here using 'record' => $customer->toJson(),
var marker = false;
var customer = {!!$record!!}

function initAutocomplete() {
var map = new google.maps.Map(document.getElementById('map'), {
   center: JSON.parse(customer.latlng),
   zoom: 9,
   mapTypeId: google.maps.MapTypeId.ROADMAP
 });

var infowindow = new google.maps.InfoWindow({
  content: customer.company+'<br>'+customer.fname+' '+customer.lname+'<br>'+customer.postcode
});    

var marker = new google.maps.Marker({
  position: JSON.parse(customer.latlng),
  map: map,
  title: customer.company+'<br>'+customer.fname+' '+customer.lname
});
     
marker.addListener('click', function() {
  infowindow.open(map, marker);
});      

marker.setMap(map);
}
</script>
​
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ env('MAPS_API') }}&libraries=places&callback=initAutocomplete"></script>