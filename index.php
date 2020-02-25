<?php
$sData = file_get_contents('most-popular-flights.json');
$jData = array();


if ( !isset($_GET['fromCity']) && !isset($_GET['toCity']) ){
  $jData = json_decode($sData);

} else if ( isset($_GET['toCity']) && isset($_GET['fromCity']) ) {
  // FILTERING THE JSON DATA FOR SELECTED CITIES
  $jUnfilteredData = json_decode($sData);

  foreach($jUnfilteredData as $key => $jFlight){
    // Sorting schedules by order
    usort($jFlight->schedule, "sortScheduleByOrder");

    // COUNTING LENGTH OF ARRAY
    $jFlight->totalStops = count($jFlight->schedule);
    $iIndexFinal = $jFlight->totalStops - 1;

    foreach($jFlight->schedule as $index => $jFlightSchedule) {

      $sFirstFromCity = strtolower($jFlight->schedule[0]->from);
      $sFinalToCity = strtolower($jFlight->schedule[$iIndexFinal]->to);

      $sSearchFromCity = strtolower($_GET['fromCity']);
      $sSearchToCity = strtolower($_GET['toCity']);

      if ( !$sFirstFromCity === $sSearchFromCity && !$sFinalToCity === $sSearchToCity ){
        break;
        
      } else if ( $sFirstFromCity === $sSearchFromCity && $sFinalToCity === $sSearchToCity ) {

        array_push($jData, $jUnfilteredData[$key]);
        break;
      }
      // $sFlightFinalDestination = $jFlight->schedule[$iIndexFinal]->to;
    }
  }
}

function sortScheduleByOrder($a, $b) {
  return $a->order - $b->order;
}

function sortFlightsByCheapest($a, $b) {
  return $a->price - $b->price;
}

function sortFlightsByFastest($a, $b) {
  return $a->totalTime - $b->totalTime;
}




$sFlightsDivs = '';

if ( count($jData) > 0 ) {

  
  if (isset($_GET['sortBy'])) {
    switch ($_GET['sortBy']) {
      case 'fastest':
        usort($jData, "sortFlightsByFastest");
      break;
      case 'cheapest':
        usort($jData, "sortFlightsByCheapest");
      break;
      case 'best':
        echo 'lol best';
      break;
    }
  }

foreach($jData as $index => $jFlight){

  // Sorting schedule of each individual $jFlight
  usort($jFlight->schedule, "sortScheduleByOrder");

  $iCheapestPrice = $iCheapestPrice ?? $jFlight->price;
  if($jFlight->price < $iCheapestPrice){
    $iCheapestPrice = $jFlight->price;
  }

  $iFirstDepartureDate =0;
  $iFirstDepartureDate = $jFlight->schedule[0]->date;
  $sFirstDepartureDate = date("Y-M-d H:i", substr($iFirstDepartureDate, 0, 10));

  // Calculating the total time for each flight - resetting each loop
  $jFlight->totalTime = 0;

  foreach($jFlight->schedule as $key => $jSchedule){
    $jSingleSchedule = $jFlight->schedule[$key];
    $jFlight->totalTime = $jFlight->totalTime + $jSingleSchedule->flightTime + $jSingleSchedule->waitingTime;
  };

  $iTotalTimeMinutes = round($jFlight->totalTime / 60);

  $iFinalArrivalDate = 0;
  $iFinalArrivalDate = $iFirstDepartureDate + $jFlight->totalTime;
  $sFinalArrivalDate = date("Y-M-d H:i", substr($iFinalArrivalDate, 0, 10));
 
  $jFlight->totalStops = count($jFlight->schedule);
  $iIndexFinal = $jFlight->totalStops - 1;

  $sFlightFirstFrom = $jFlight->schedule[0]->from;
  $sFlightFinalDestination = $jFlight->schedule[$iIndexFinal]->to;

  $jFlight->firstDeparture = $sFirstDepartureDate;
  $jFlight->finalArrival = $sFinalArrivalDate;

  $jFlight->firstFrom = $sFlightFirstFrom;
  $jFlight->lastTo = $sFlightFinalDestination;

  $sStopText = "";

  $sFlightData = json_encode($jFlight);

  $sFlightsDivs .= "
    <div id='flight'>
    <div id='flight-route'>
      <div class='row'>
        <div>
          <input type='checkbox'>
        </div>
        <div>
          <img class='airline-icon' src='$jFlight->companyShortcut.png'>
        </div>
        <div>
          $sFirstDepartureDate - $sFinalArrivalDate
          <p>$jFlight->companyShortcut</p>              
        </div>
        <div>
          $jFlight->totalStops stops
          <p>direct</p>
        </div>
        <div>
          10h. 20min.
          <p>$sFlightFirstFrom - $sFlightFinalDestination</p>
        </div>
      </div>
      <div class='row'>
        <div>
          <input type='checkbox'>
        </div>
        <div>
          <img class='airline-icon' 
          src='AF.png'>
        </div>
        <div>
          18:15 - 18:30
          <p>KLM</p>              
        </div>
        <div>
          1 stop
          <p>Amsterdam</p>
        </div>
        <div>
          10h. 20min.
          <p>CPH-MIA</p>
        </div>
      </div>            
    </div>
    <div id='flight-buy'>
      <div>
        $jFlight->price $jFlight->currency
      </div>
      <button class='buy-flight-btn' onclick='buyModal($sFlightData)'>BUY</button>
    </div>
    </div>
    
    ";
  }
} else {
  $iCheapestPrice = 0;
  $sFlightsDivs = "<h1 style='text-align:center;'>NO MATCHING FLIGHTS FOUND</h1>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="app.css">
  <title>MOMONDO</title>
</head>
<body>
  
<nav>
        <a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 250 38" height="38" width="250"><defs><linearGradient id="header-primary" x2="0" y2="100%"><stop offset="0" stop-color="#00d7e5"/><stop offset="1" stop-color="#0066ae"/></linearGradient><linearGradient id="header-secondary" x2="0" y2="100%"><stop offset="0" stop-color="#ff30ae"/><stop offset="1" stop-color="#d1003a"/></linearGradient><linearGradient id="header-tertiary" x2="0" y2="100%"><stop offset="0" stop-color="#ffba00"/><stop offset="1" stop-color="#f02e00"/></linearGradient></defs><path fill="url(#header-primary)" d="M23.2 15.5c2.5-2.7 6-4.4 9.9-4.4 8.7 0 13.4 6 13.4 13.4v12.8c0 .3-.3.5-.5.5h-6c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-6c-.3 0-.5-.2-.5-.5V24.5c0-7.4 4.7-13.4 13.3-13.4 4 0 7.5 1.7 9.9 4.4m54.3 9.1c0 7.5-5.2 13.4-14 13.4s-14-5.9-14-13.4c0-7.6 5.2-13.4 14-13.4 8.8-.1 14 5.9 14 13.4zm-6.7 0c0-3.7-2.4-6.8-7.3-6.8-5.2 0-7.3 3.1-7.3 6.8 0 3.7 2.1 6.8 7.3 6.8 5.1-.1 7.3-3.1 7.3-6.8z"/><path fill="url(#header-secondary)" d="M103.8 15.5c2.5-2.7 6-4.4 9.9-4.4 8.7 0 13.4 6 13.4 13.4v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5H101c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-7.4 4.7-13.4 13.3-13.4 3.8 0 7.3 1.7 9.7 4.4m54.3 9.1c0 7.5-5.2 13.4-14 13.4s-14-5.9-14-13.4c0-7.6 5.2-13.4 14-13.4 8.7-.1 14 5.9 14 13.4zm-6.7 0c0-3.7-2.3-6.8-7.3-6.8-5.2 0-7.3 3.1-7.3 6.8 0 3.7 2.1 6.8 7.3 6.8 5.1-.1 7.3-3.1 7.3-6.8zm9.8-.1v12.8c0 .3.2.5.5.5h5.9c.3 0 .5-.2.5-.5V24.5c0-4.6 3.1-5.9 6.4-5.9 3.3 0 6.4 1.3 6.4 5.9v12.8c0 .3.2.5.5.5h5.9c.3 0 .5-.2.5-.5V24.5c0-7.4-4.5-13.4-13.4-13.4-8.7 0-13.2 6-13.2 13.4"/><path fill="url(#header-tertiary)" d="M218.4 0h-5.9c-.3 0-.5.2-.5.5v13c-1.3-1.2-4.3-2.4-7-2.4-8.8 0-14 5.9-14 13.4s5.2 13.4 14 13.4c8.7 0 14-5.2 14-14.6V.4c-.1-.2-.3-.4-.6-.4zm-13.5 31.3c-5.2 0-7.3-3-7.3-6.8 0-3.7 2.1-6.8 7.3-6.8 4.9 0 7.3 3 7.3 6.8s-2.2 6.8-7.3 6.8z"/><path fill="url(#header-tertiary)" d="M236 11.1c-8.8 0-14 5.9-14 13.4s5.2 13.4 14 13.4 14-5.9 14-13.4c0-7.4-5.3-13.4-14-13.4zm0 20.2c-5.2 0-7.3-3.1-7.3-6.8 0-3.7 2.1-6.8 7.3-6.8 4.9 0 7.3 3.1 7.3 6.8 0 3.8-2.2 6.8-7.3 6.8z"/></svg>
        </a>
        <a href="booking.php">My Booking</a>
        <a href="admin.php">Admin Login</a>
    </nav>

  <section id="search">
    
    <div id="boxFromCity">
      <input id="inputFromCity" oninput="getFromCities(this)" type="text" placeholder="From city">
      <div id="fromCityResults"></div>
    </div>


    <div class="to-switch">TO</div>
    <div id="boxToCity">
      <input id="inputToCity" oninput="getToCities(this)" type="text" placeholder="To city">
      <div id="toCityResults"></div>
    </div>

    <button id="btnSearch" onclick="searchCities()">SEARCH</button>
  </section>

  <section id="temporal">
    <img src="temporal.png">
  </section>

  <main>
    <div id="options">
      <div id="price-agent">
        <p>Price Agent</p>
        <p>Get updates on this route.</p>
        <hr>
        <div style="display:flex;"><p>Price Agent</p> <input type="checkbox" name="" id=""></div>
      </div>

    </div>


    <div id="results">

      <div id="price-options">
        <div id="cheapest">
          Cheapest
          <p>
            <span class="price">
              <?= $iCheapestPrice ?> DKK
            </span>
            <span class="time">19h. 37min.</span>
          </p>
        </div>
        <div id="best" class="active">
          Best
          <p>
            <span class="price">4.956 DKK</span>
            <span class="time">19h. 37min.</span>
          </p>
        </div>
        <div id="fastest">
          Fastest
          <p>
            <span class="price">4.956 DKK</span>
            <span class="time">19h. 37min.</span>
          </p>
        </div>
        <div>
          Custom
          <p>compare and choose</p>
        </div>
      </div>

      <div id="flights">  
        <?= $sFlightsDivs ?>
        <a class='refresh-search-btn' href='index.php' style="text-align:center; font-weight:400; font-size:24px;">REFRESH SEARCH </a>
      </div>



    </div>
  </main>

  <script src="app.js"></script>
  <script>
    function buyModal(flightData){
      console.log(flightData);
      let modalBuyForm = `
      <div id="modalBuyContainer">
      <div class="form-wrapper">
      
      
        <form class="modal-form" action="api-buy-flight.php" method="POST">
        <div class="form-heading"><h2> You are purchasing Flight ${flightData.id} with ${flightData.companyName}</h2><div class="x-btn red-btn" onclick="this.parentNode.parentNode.parentNode.parentNode.remove()">X</div></div>
        <p><strong>Price:</strong> ${flightData.price}</p>
        <p><strong>From:</strong> ${flightData.firstFrom}</p>
        <p><strong>To:</strong> ${flightData.lastTo}</p>
        <p><strong>Date:</strong> ${flightData.firstDeparture} - ${flightData.finalArrival} </p>
          <input type='hidden' name='flight-flightId' value='${flightData.id}' />
          <input type='hidden' name='flight-company' value='${flightData.companyName}' />
          <input type='hidden' name='flight-from' value='${flightData.firstDeparture}' />
          <input type='hidden' name='flight-to' value='${flightData.finalArrival}' />
          <h2>Customer Information</h2>
          <input name="customer-name" oninput="validate(this)" type="text" placeholder="First Name" required="required" data-validate="yes" data-type="string">
          <input name="customer-lastname" oninput="validate(this)" type="text" placeholder="Last Name" required="required" data-validate="yes" data-type="string">
          <input name="customer-email" oninput="validate(this)" type="text" placeholder="Email Address" required="required" data-validate="yes" data-type="string">
          <input name="customer-phone" oninput="validate(this)" type="text" placeholder="Phone Number" required="required" data-validate="yes" data-type="integer">
                  
                  <button class="modal-btn green-btn" type="submit" onclick="validate(this)">BUY</button> 
        </form>
        </div>
      </div>
      `
      document.querySelector('body').innerHTML += modalBuyForm;
    };
    var urlParams = new URLSearchParams(window.location.search);

    if (urlParams.get("fromCity")) {
      document.querySelector('#inputFromCity').value = urlParams.get("fromCity")
    }

    if (urlParams.get("toCity")) {
      document.querySelector('#inputToCity').value = urlParams.get("toCity")
    }

    
  </script>
</body>
</html>