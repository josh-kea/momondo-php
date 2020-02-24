<?php
   require_once('has-access.php');
if( 
        $_POST['flight-flightId'] &&
        $_POST['flight-companyName'] && 
        $_POST['flight-companyShortcut'] &&
        $_POST['flight-price'] &&
        $_POST['flight-currency'] &&
        $_POST['schedule-order'] &&
        $_POST['schedule-icon'] &&
        $_POST['schedule-date'] &&
        $_POST['schedule-id'] &&
        $_POST['schedule-from'] &&
        $_POST['schedule-to'] &&
        $_POST['schedule-waitingTime'] &&
        $_POST['schedule-flightTime']
    ){
        echo isset($_POST['flight-flightId']);
        $sData = file_get_contents('most-popular-flights.json');
        // echo $sData;
        $jData = json_decode($sData);

        $jFlight = new stdClass();

        $jFlight->id = bin2hex(random_bytes(3));
        $jFlight->flightId = $_POST['flight-flightId'];
        $jFlight->companyName = $_POST['flight-companyName'];
        $jFlight->companyShortcut = $_POST['flight-companyShortcut'];
        $jFlight->price = $_POST['flight-price'];
        $jFlight->currency = $_POST['flight-currency'];

        $jFlight->schedule[0]->order = $_POST['schedule-order'];
        $jFlight->schedule[0]->airlineIcon = $_POST['schedule-icon'];
        $jFlight->schedule[0]->date = $_POST['schedule-date'];
        $jFlight->schedule[0]->id = $_POST['schedule-id'];
        $jFlight->schedule[0]->from = $_POST['schedule-from'];
        $jFlight->schedule[0]->to = $_POST['schedule-to'];
        $jFlight->schedule[0]->waitingTime = $_POST['schedule-waitingTime'];
        $jFlight->schedule[0]->flightTime = $_POST['schedule-flightTime'];

        // How to add to an array. Array and then value
        array_push($jData, $jFlight);
        
        
        // Write back to the file
        $sData = json_encode($jData, JSON_PRETTY_PRINT);
        // Save city to file
        file_put_contents('most-popular-flights.json', $sData);
        // Redirect
        header('Location: admin-dashboard.php');
    }   
