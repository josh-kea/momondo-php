<?php
$sData = file_get_contents('most-popular-flights.json');
$jData = json_decode($sData);
$sFlightsDivs = '';
foreach($jData as $jFlight){
  $iCheapestPrice = $iCheapestPrice ?? $jFlight->price;
  if($jFlight->price < $iCheapestPrice){
    $iCheapestPrice = $jFlight->price;
  }
  $sDepartureDate = date("Y-M-d H:i", substr($jFlight->departureTime, 0, 10)); 

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
          $sDepartureDate - 18:30
          <p>$jFlight->companyShortcut</p>              
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
        $jFlight->price Kr.
      </div>
      <button>BUY</button>
    </div>
  </div>
  ";
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
        <a href="fly.php">fly</a>
        <a href="hotel.php">hotel</a>
        <a href="car.php">car</a>
        <a href="trips.php">trips</a>
        <a href="discover.php">discover</a>
        <a href="my-trips.php">my trips</a>
        <a href="admin.php">Admin Login</a>
    </nav>

  <section id="search">
    
    <div id="boxFromCity">
      <input oninput="getFromCities()" type="text" placeholder="from city">
      <div id="fromCityResults"></div>
    </div>


    <button>&lt;- -&gt;</button>
    <input type="text" placeholder="to city">
    <input type="text" placeholder="from date">
    <input type="text" placeholder="to date">
    <button id="btnSearch">SEARCH</button>
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
              <?= $iCheapestPrice ?>
            </span>
            <span class="time">19h. 37min.</span>
          </p>
        </div>
        <div id="best" class="active">
          Best
          <p>
            <span class="price">4.956 kr</span>
            <span class="time">19h. 37min.</span>
          </p>
        </div>
        <div id="fastest">
          Fastest
          <p>
            <span class="price">4.956 kr</span>
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
      </div>



    </div>
  </main>

  <script src="app.js"></script>

</body>
</html>