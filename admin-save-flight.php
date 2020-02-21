<?php
   require_once('has-access.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Save Flight</title>
    <link rel="stylesheet" href="admin.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400&display=swap" rel="stylesheet">
</head>
<body>

    <form action="api-save-flight.php" method="POST">
        <input name="flight-flightId" oninput="validate(this)" type="text" placeholder="Flight ID (Eg KL222)" required="required" data-validate="yes" data-type="string">
        <input name="flight-companyName" oninput="validate(this)" type="text" placeholder="Company Name" required="required" data-validate="yes" data-type="string">
        <input name="flight-companyShortcut" oninput="validate(this)" type="text" placeholder="Company Shortcut" required="required" data-validate="yes" data-type="string">
        <input name="flight-departureTime" oninput="validate(this)" type="text" placeholder="Departure Time" required="required" data-validate="yes" data-type="integer">
        <input name="flight-arrivalTime" oninput="validate(this)" type="text" placeholder="Arrival Time" required="required" data-validate="yes" data-type="integer">
        <input name="flight-price" oninput="validate(this)" type="text" placeholder="Price" required="required" data-validate="yes" data-type="integer">
        <input name="flight-currency" oninput="validate(this)" type="text" placeholder="Currency" required="required" data-validate="yes" data-type="string">
        <button type="submit" onclick="validate(this)">SAVE</button> 
    </form>


    <script src="validator.js"></script>
</body>
</html>