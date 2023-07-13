<?php
  $lat= $_POST['latitude']; //latitude
  $lng= $_POST['longitude']; //longitude
  
  //google map api url
  $url = "http://maps.google.com/maps/api/geocode/json?latlng=$lat,$lng";

  // send http request
  $geocode = file_get_contents($url);
  $json = json_decode($geocode);
  $address = $json->results[0]->formatted_address;
  return $address;
?>