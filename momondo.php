<?php

$sData = file_get_contents('data.json');

$jData = json_decode($sData); 

echo json_encode($jData);





