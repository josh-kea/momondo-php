

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

</head>
<body>
    
        <div style="display:grid; justify-content:center; grid-row-gap:20px;">
        <a href="index.php" style="text-align:center; margin-top:50px;"><svg style="height:100%;"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 250 38" height="38" width="250"><defs><linearGradient id="header-primary" x2="0" y2="100%"><stop offset="0" stop-color="#00d7e5"/><stop offset="1" stop-color="#0066ae"/></linearGradient><linearGradient id="header-secondary" x2="0" y2="100%"><stop offset="0" stop-color="#ff30ae"/><stop offset="1" stop-color="#d1003a"/></linearGradient><linearGradient id="header-tertiary" x2="0" y2="100%"><stop offset="0" stop-color="#ffba00"/><stop offset="1" stop-color="#f02e00"/></linearGradient></defs><path fill="url(#header-primary)" d="M23.2 15.5c2.5-2.7 6-4.4 9.9-4.4 8.7 0 13.4 6 13.4 13.4v12.8c0 .3-.3.5-.5.5h-6c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-6c-.3 0-.5-.2-.5-.5V24.5c0-7.4 4.7-13.4 13.3-13.4 4 0 7.5 1.7 9.9 4.4m54.3 9.1c0 7.5-5.2 13.4-14 13.4s-14-5.9-14-13.4c0-7.6 5.2-13.4 14-13.4 8.8-.1 14 5.9 14 13.4zm-6.7 0c0-3.7-2.4-6.8-7.3-6.8-5.2 0-7.3 3.1-7.3 6.8 0 3.7 2.1 6.8 7.3 6.8 5.1-.1 7.3-3.1 7.3-6.8z"/><path fill="url(#header-secondary)" d="M103.8 15.5c2.5-2.7 6-4.4 9.9-4.4 8.7 0 13.4 6 13.4 13.4v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5H101c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-7.4 4.7-13.4 13.3-13.4 3.8 0 7.3 1.7 9.7 4.4m54.3 9.1c0 7.5-5.2 13.4-14 13.4s-14-5.9-14-13.4c0-7.6 5.2-13.4 14-13.4 8.7-.1 14 5.9 14 13.4zm-6.7 0c0-3.7-2.3-6.8-7.3-6.8-5.2 0-7.3 3.1-7.3 6.8 0 3.7 2.1 6.8 7.3 6.8 5.1-.1 7.3-3.1 7.3-6.8zm9.8-.1v12.8c0 .3.2.5.5.5h5.9c.3 0 .5-.2.5-.5V24.5c0-4.6 3.1-5.9 6.4-5.9 3.3 0 6.4 1.3 6.4 5.9v12.8c0 .3.2.5.5.5h5.9c.3 0 .5-.2.5-.5V24.5c0-7.4-4.5-13.4-13.4-13.4-8.7 0-13.2 6-13.2 13.4"/><path fill="url(#header-tertiary)" d="M218.4 0h-5.9c-.3 0-.5.2-.5.5v13c-1.3-1.2-4.3-2.4-7-2.4-8.8 0-14 5.9-14 13.4s5.2 13.4 14 13.4c8.7 0 14-5.2 14-14.6V.4c-.1-.2-.3-.4-.6-.4zm-13.5 31.3c-5.2 0-7.3-3-7.3-6.8 0-3.7 2.1-6.8 7.3-6.8 4.9 0 7.3 3 7.3 6.8s-2.2 6.8-7.3 6.8z"/><path fill="url(#header-tertiary)" d="M236 11.1c-8.8 0-14 5.9-14 13.4s5.2 13.4 14 13.4 14-5.9 14-13.4c0-7.4-5.3-13.4-14-13.4zm0 20.2c-5.2 0-7.3-3.1-7.3-6.8 0-3.7 2.1-6.8 7.3-6.8 4.9 0 7.3 3.1 7.3 6.8 0 3.8-2.2 6.8-7.3 6.8z"/></svg></a>   
        
        <?php 

        if (isset($_GET['bookingCode']) && isset($_GET['lastName'])){
            
            $sBookingCode = $_GET['bookingCode'];
            $sLastName = $_GET['lastName'];

            $sData = file_get_contents('bookings.json');
            $jBookings = json_decode($sData);

            $jCurrentBooking = "";

            foreach($jBookings as $key => $jBooking){

                if(strtolower($jBooking->bookingCode) == strtolower($_GET['bookingCode']) && strtolower($jBooking->customerLastname) == strtolower($_GET['lastName'])){
                    $jCurrentBooking = $jBooking;
                    break;
                }
            }

            if (!$jCurrentBooking) {
                echo "No Booking Found";
                echo "<form action='booking.php' method='GET' style='display:grid;width:100%; grid-row-gap:20px;'>
                    <input style='background-color:white; type='text' name='bookingCode' placeholder='Last Name' required='required' value='ff411def6281135c3c67d2b64303a252'></input>
                    <input style='background-color:white; type='text' name='lastName' placeholder='Booking Code' required='required' value='kaplan'>
                    <button style='background-color:white; type='submit'>Submit</button>
                    </form>";

            } else if ($jCurrentBooking) {
                echo "
                <p>Your Booking Code: $jCurrentBooking->bookingCode</p>
                <p>Your Flight ID: $jCurrentBooking->flightId</p>
                <p>Flight Company: $jCurrentBooking->flightCompany</p>
                <p>Your Flight Start Date: $jCurrentBooking->flightFrom</p>
                <p>Your Flight End Date: $jCurrentBooking->flightTo</p>
                <p>Name on booking: $jCurrentBooking->customerName $jCurrentBooking->customerLastname</p>
                <img style='width:100px; height:100px; ' src='qr.png'>
                ";
            }

     





        } else {
            echo "<h1>Enter Your Last Name and Booking Code</h1>";
            echo "<form action='booking.php' method='GET' style='display:grid;width:100%; grid-row-gap:20px;'>
                    <input style='background-color:white; type='text' name='bookingCode' placeholder='Booking Code' required='required' value='ff411def6281135c3c67d2b64303a252'></input>
                    <input style='background-color:white; type='text' name='lastName' placeholder='Your Last Name' required='required' value='kaplan'>
                    <button style='background-color:white; type='submit'>Submit</button>
                    </form>";
        }
        
        
        ?>
            
    </div>

</body>
<style>
    input {
        height: 50px !important;
        padding-left:15px;

        border-radius:5px;
        border:none;
    }

    html {
        background-color:#F1F1F1;
        font-family: 'Roboto', sans-serif;
        font-weight: 300;
    }
    button {
        padding:10px;
        border-radius:5px;
        cursor:pointer;
        border:none;
        border: none;
    margin-top: 10px;
    padding: 10px;
    font-weight: 400;
    background-color: #307BFF !important;
    border-radius: 5px;
    color: white;
    width: 50%;
    height: 50px !important;
    justify-self: right;
    padding: 5px;
    text-decoration: none;
    cursor: pointer;
    }
</style>
</html>