<?php
require_once('has-access.php');

$flightId = $_GET['id'];

$sData = file_get_contents('most-popular-flights.json');

$jData = json_decode($sData);

foreach($jData as $index=>$jFlight){
  if($flightId == $jFlight->id){

    array_splice($jData, $index, 1);
    break;
  }
}

$sData = json_encode($jData, JSON_PRETTY_PRINT);

file_put_contents('most-popular-flights.json', $sData);

header('Location: admin-dashboard.php');