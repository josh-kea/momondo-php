<?php
http_response_code(200);
header('Content-Type: application/json');

$sData = file_get_contents('most-popular-flights.json');

$jData = json_decode($sData);

$aToCities = array();

foreach($jData as $key => $jFlight) {
    foreach($jFlight->schedule as $index =>$jSchedule){
        array_push($aToCities, $jSchedule->to);
    }
}

$aToCitiesUnique = array_unique($aToCities, SORT_REGULAR); 
$aToCitiesValues = array_values($aToCitiesUnique);

echo json_encode($aToCitiesValues);