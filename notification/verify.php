<?php 
    $sKey = $_GET['key'];
    // Connect to the DB

    $sData = file_get_contents('data.json');
    $jData = json_decode($sData);
// Check if the key matches
// if so, flip the verified to 1
// else, show error message

if ($sKey == $jData->key){
    $jData->verified = 1;
    $sData = json_encode($jData);
    file_put_contents('data.json', $sData);
    header('Location: login.php');
    exit();
}

echo 'ERROR -- CANNOT VERIFY';


