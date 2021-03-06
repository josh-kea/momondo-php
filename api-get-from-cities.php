<?php
http_response_code(200);
header('Content-Type: application/json');

$sData = file_get_contents('most-popular-flights.json');

$jData = json_decode($sData);

$aFromCities = array();

foreach($jData as $key => $jFlight) {
    foreach($jFlight->schedule as $index =>$jSchedule){
        array_push($aFromCities, $jSchedule->from);
    }
}

$aFromCitiesUnique = array_unique($aFromCities, SORT_REGULAR); 
$aFromCitiesValues = array_values($aFromCitiesUnique);

echo json_encode($aFromCitiesValues);