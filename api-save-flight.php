<?php
   require_once('has-access.php');
if( 
        $_POST['flight-flightId'] &&
        $_POST['flight-companyName'] && 
        $_POST['flight-companyShortcut'] &&
        $_POST['flight-departureTime'] &&
        $_POST['flight-arrivalTime'] &&
        $_POST['flight-price'] &&
        $_POST['flight-currency']
    ){
        echo isset($_POST['flight-flightId']);
        $sData = file_get_contents('most-popular-flights.json');
        // echo $sData;
        $jData = json_decode($sData);

        $jFlight = new stdClass();

        $sTotalTime = ($_POST['flight-arrivalTime'] - $_POST['flight-departureTime']);

        $jFlight->id = bin2hex(random_bytes(3));
        $jFlight->flightId = $_POST['flight-flightId'];
        $jFlight->companyName = $_POST['flight-companyName'];
        $jFlight->companyShortcut = $_POST['flight-companyShortcut'];
        $jFlight->departureTime = $_POST['flight-departureTime'];
        $jFlight->arrivalTime = $_POST['flight-arrivalTime'];
        $jFlight->price = $_POST['flight-price'];
        $jFlight->currency = $_POST['flight-currency'];
        $jFlight->totalTime = $sTotalTime;

        
        // How to add to an array. Array and then value
        array_push($jData, $jFlight);
        
        
        // Write back to the file
        $sData = json_encode($jData, JSON_PRETTY_PRINT);
        // Save city to file
        file_put_contents('most-popular-flights.json', $sData);
        // Redirect
        header('Location: admin-dashboard.php');
    }   
