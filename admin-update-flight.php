<?php
    session_start();

  if(  isset($_GET['id'])   ){
    $sFlightId = $_GET['id'];
    // Open file
    // $_SESSION['flightId'] = $_GET['id'];
    // echo $_SESSION['flightId'];

    $sData = file_get_contents('most-popular-flights.json');
    // Convert text to JSON
    $jData = json_decode($sData);

    $bFlightFound = false;
    
    foreach($jData as $jFlight){
      if($sFlightId == $jFlight->id){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin Update Flight</title>
            <link rel="stylesheet" href="admin.css">
            <link href="https://fonts.googleapis.com/css?family=Poppins:300,400&display=swap" rel="stylesheet">
        </head>
        <body>

            <form action="api-update-flight.php?id=<?=$_GET['id']?>" method="POST">
                <input name="flight-flightId" oninput="validate(this)" type="text" placeholder="Flight ID (Eg KL222)" required="required" data-validate="yes" data-type="string" value=<?= $jFlight->flightId ?>>
                <input name="flight-companyName" oninput="validate(this)" type="text" placeholder="Company Name" required="required" data-validate="yes" data-type="string" value=<?= $jFlight->companyName ?>>
                <input name="flight-companyShortcut" oninput="validate(this)" type="text" placeholder="Company Shortcut" required="required" data-validate="yes" data-type="string" value=<?= $jFlight->companyShortcut ?>>
                <input name="flight-departureTime" oninput="validate(this)" type="text" placeholder="Departure Time" required="required" data-validate="yes" data-type="integer" value=<?= $jFlight->departureTime ?>>
                <input name="flight-arrivalTime" oninput="validate(this)" type="text" placeholder="Arrival Time" required="required" data-validate="yes" data-type="integer" value=<?= $jFlight->arrivalTime ?>>
                <input name="flight-price" oninput="validate(this)" type="text" placeholder="Price" required="required" data-validate="yes" data-type="integer" value=<?= $jFlight->price ?>>
                <input name="flight-currency" oninput="validate(this)" type="text" placeholder="Currency" required="required" data-validate="yes" data-type="string" value=<?= $jFlight->currency ?>>
                <button type="submit" onclick="validate(this)">UPDATE</button> 
            </form>


            <script src="validator.js"></script>
        </body>
        </html>
        <?php
        $bFlightFound = true;
        break;
      }
    }

    if($bFlightFound == false){
      header('Location: admin-dashboard.php');
    }


  }
?>






