<?php
http_response_code(200);
header('Content-Type: application/json');
$aFromCities = ["X", "T", "W"];
echo json_encode($aFromCities);


