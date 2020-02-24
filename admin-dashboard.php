<?php
  // To start using sessions/cookies 
  require_once('has-access.php');
  $sUserEmail = $_SESSION['sEmail'];
  $sUserName = $_SESSION['sName'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADMIN</title>
  <link rel="stylesheet" href="admin.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400&display=swap" rel="stylesheet">
</head>
<body>

  
    <div id="navbar" class="wrapper">
      <nav id="admin-navbar" >
        <div style="display:flex; align-items:center;">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 250 38" height="38" width="250"><defs><linearGradient id="header-primary" x2="0" y2="100%"><stop offset="0" stop-color="#00d7e5"/><stop offset="1" stop-color="#0066ae"/></linearGradient><linearGradient id="header-secondary" x2="0" y2="100%"><stop offset="0" stop-color="#ff30ae"/><stop offset="1" stop-color="#d1003a"/></linearGradient><linearGradient id="header-tertiary" x2="0" y2="100%"><stop offset="0" stop-color="#ffba00"/><stop offset="1" stop-color="#f02e00"/></linearGradient></defs><path fill="url(#header-primary)" d="M23.2 15.5c2.5-2.7 6-4.4 9.9-4.4 8.7 0 13.4 6 13.4 13.4v12.8c0 .3-.3.5-.5.5h-6c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-6c-.3 0-.5-.2-.5-.5V24.5c0-7.4 4.7-13.4 13.3-13.4 4 0 7.5 1.7 9.9 4.4m54.3 9.1c0 7.5-5.2 13.4-14 13.4s-14-5.9-14-13.4c0-7.6 5.2-13.4 14-13.4 8.8-.1 14 5.9 14 13.4zm-6.7 0c0-3.7-2.4-6.8-7.3-6.8-5.2 0-7.3 3.1-7.3 6.8 0 3.7 2.1 6.8 7.3 6.8 5.1-.1 7.3-3.1 7.3-6.8z"/><path fill="url(#header-secondary)" d="M103.8 15.5c2.5-2.7 6-4.4 9.9-4.4 8.7 0 13.4 6 13.4 13.4v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5H101c-.3 0-.5-.2-.5-.5V24.5c0-4.6-3.1-5.9-6.4-5.9-3.2 0-6.4 1.3-6.4 5.9v12.8c0 .3-.3.5-.5.5h-5.9c-.3 0-.5-.2-.5-.5V24.5c0-7.4 4.7-13.4 13.3-13.4 3.8 0 7.3 1.7 9.7 4.4m54.3 9.1c0 7.5-5.2 13.4-14 13.4s-14-5.9-14-13.4c0-7.6 5.2-13.4 14-13.4 8.7-.1 14 5.9 14 13.4zm-6.7 0c0-3.7-2.3-6.8-7.3-6.8-5.2 0-7.3 3.1-7.3 6.8 0 3.7 2.1 6.8 7.3 6.8 5.1-.1 7.3-3.1 7.3-6.8zm9.8-.1v12.8c0 .3.2.5.5.5h5.9c.3 0 .5-.2.5-.5V24.5c0-4.6 3.1-5.9 6.4-5.9 3.3 0 6.4 1.3 6.4 5.9v12.8c0 .3.2.5.5.5h5.9c.3 0 .5-.2.5-.5V24.5c0-7.4-4.5-13.4-13.4-13.4-8.7 0-13.2 6-13.2 13.4"/><path fill="url(#header-tertiary)" d="M218.4 0h-5.9c-.3 0-.5.2-.5.5v13c-1.3-1.2-4.3-2.4-7-2.4-8.8 0-14 5.9-14 13.4s5.2 13.4 14 13.4c8.7 0 14-5.2 14-14.6V.4c-.1-.2-.3-.4-.6-.4zm-13.5 31.3c-5.2 0-7.3-3-7.3-6.8 0-3.7 2.1-6.8 7.3-6.8 4.9 0 7.3 3 7.3 6.8s-2.2 6.8-7.3 6.8z"/><path fill="url(#header-tertiary)" d="M236 11.1c-8.8 0-14 5.9-14 13.4s5.2 13.4 14 13.4 14-5.9 14-13.4c0-7.4-5.3-13.4-14-13.4zm0 20.2c-5.2 0-7.3-3.1-7.3-6.8 0-3.7 2.1-6.8 7.3-6.8 4.9 0 7.3 3.1 7.3 6.8 0 3.8-2.2 6.8-7.3 6.8z"/></svg>
          <h1 style="font-weight:400; font-size:24px; margin-left:10px;">ADMIN DASHBOARD</h1>
        </div>
        <div>
        Logged in as: <span style="font-weight:400;"><?= "$sUserName"?> </span>
        <a class="red-btn" href="admin-logout.php" style="background-color:#DC3545; color:white; margin-left:10px;border-radius:5px;padding:5px; text-decoration:none;">Logout</a>
        </div>
      </nav>
    </div>


  <section id="flights">
    
    <div class="wrapper">
      <button onclick="clickAdd()" type="button" id="add-new-flight">+ ADD NEW FLIGHT</button>
      <!-- END CREATE FLIGHT CONTAINER -->
      <div id="flightContainerHeadings" class='flight-container'>
        <div>ID</div>
        <div>Flight ID</div>
        <div>Company</div>
        <div>Company Code</div>
        <div>Departure Date</div>
        <div>Arrival Date</div>
        <div>Price</div>
        <div>Currency</div>
        <div>Total Time</div>
        <div>Actions</div>
      </div>
    <?php
      $sData = file_get_contents('most-popular-flights.json');
      $jData = json_decode($sData);


      //Sorting function
      function sortScheduleByOrder($a, $b) {
        return strcmp($a->order, $b->order);
      }

      foreach($jData as $index => $jFlight){

        // Sorting schedule of each individual $jFlight
        usort($jFlight->schedule, "sortScheduleByOrder");

        // Calculating the total time for each flight - resetting each loop
        $jFlight->totalTime = 0;

        foreach($jFlight->schedule as $key => $jSchedule){
          $jSingleSchedule = $jFlight->schedule[$key];
          $jFlight->totalTime = $jFlight->totalTime + $jSingleSchedule->flightTime + $jSingleSchedule->waitingTime;
        };
        $iFirstDepartureDate =0;
        $iFirstDepartureDate = $jFlight->schedule[0]->date;
        $sFirstDepartureDate = date("Y-M-d H:i", substr($iFirstDepartureDate, 0, 10));

        $iFinalArrivalDate = 0;
        if (isset($jFlight->totalTime)){
          $iFinalArrivalDate = $iFirstDepartureDate + $jFlight->totalTime;
          $sFinalArrivalDate = date("Y-M-d H:i", substr($iFinalArrivalDate, 0, 10));
        }
        
        

        $iTotalTimeMinutes = round($jFlight->totalTime / 60);
        // echo date("Y-m-d G:i:s", $iFinalArrivalDate);

        echo "<div id='flight-$jFlight->id' class='flight-container'>
        
        <div>$jFlight->id </div>
        <div>$jFlight->flightId </div>
        <div>$jFlight->companyName </div>
        <div>$jFlight->companyShortcut </div>
        <div>$sFirstDepartureDate</div>
        <div>$sFinalArrivalDate</div>
        <div>$jFlight->price</div>
        <div>$jFlight->currency</div>
        <div>$iTotalTimeMinutes mins.</div>


        <a class='action-btn red-btn' href='admin-delete-flight.php?id=$jFlight->id'>
          DELETE
        </a>
        <button class='action-btn green-btn' onclick=(clickUpdate(this))>UPDATE</button>
        </div>";

        // asort($jFlight->schedule->order);
        // $aFlightSchedule = $jFlight->schedule;
        // print_r($aFlightSchedule);

        // asort($aFlightSchedule);
        // Sorting schedule by order of flights




        foreach($jFlight->schedule as $key => $jSchedule){
        //   // echo $jSchedule;
        // echo $jFlight->schedule[$key]->id;
        // echo print_r($jSchedule);

        $jSingleSchedule = $jFlight->schedule[$key];
        $sStopNumber = $jSingleSchedule->order;

        echo "<div>Stop: $sStopNumber | $jSingleSchedule->id | FROM: $jSingleSchedule->from | TO: $jSingleSchedule->to | DATE: $jSingleSchedule->date  </div>";
          

        }
        
      }
    ?>
  
    </div>
  </section>  

  <script>
    function clickUpdate(btn) {
      let currentFlightDiv = btn.parentNode;
      let aFlightDivs = btn.parentNode.querySelectorAll('div');

      let modalUpdateForm = `
      <div id="modalFormContainer">
        
        <form class="modal-form" action="api-update-flight.php?id=${aFlightDivs[0].innerHTML}" method="POST">
        <div class="form-heading"><h1>You are editing flight with ID: ${aFlightDivs[0].innerHTML}</h1><div class="x-btn red-btn" onclick=(this.parentNode.parentNode.parentNode.remove())>X</div></div>
                  <label for="flight-flightId">Flight ID</label><input name="flight-flightId" oninput="validate(this)" type="text" placeholder="Flight ID (Eg KL222)" required="required" data-validate="yes" data-type="string" value=${aFlightDivs[1].innerHTML}>
                  <label for="flight-companyName">Company Name</label><input name="flight-companyName" oninput="validate(this)" type="text" placeholder="Company Name" required="required" data-validate="yes" data-type="string" value=${aFlightDivs[2].innerHTML}>
                  <label for="flight-companyShortcut">Company Code</label><input name="flight-companyShortcut" oninput="validate(this)" type="text" placeholder="Company Shortcut" required="required" data-validate="yes" data-type="string" value=${aFlightDivs[3].innerHTML}>
                  <label for="flight-price">Price</label><input name="flight-price" oninput="validate(this)" type="text" placeholder="Price" required="required" data-validate="yes" data-type="integer" value=${aFlightDivs[6].innerHTML}>
                  <label for="flight-currency">Currency</label><input name="flight-currency" oninput="validate(this)" type="text" placeholder="Currency" required="required" data-validate="yes" data-type="string" value=${aFlightDivs[7].innerHTML}>
                  
                  <button class="modal-btn green-btn" type="submit" onclick="validate(this)">UPDATE</button> 
        </form>
        
      </div>
      `

      document.querySelector('body').innerHTML += modalUpdateForm;
    }
    function clickAdd() {
      let modalAddForm = `
      <div id="modalFormContainer">
        
        <form class="modal-form" action="api-save-flight.php" method="POST">
        <div class="form-heading"><h1>You are creating a new flight</h1><div class="x-btn red-btn" onclick=(this.parentNode.parentNode.parentNode.remove())>X</div></div>
                  <label for="flight-flightId">Flight ID</label><input name="flight-flightId" oninput="validate(this)" type="text" placeholder="Flight ID (Eg KL222)" required="required" data-validate="yes" data-type="string" >
                  <label for="flight-companyName">Company Name</label><input name="flight-companyName" oninput="validate(this)" type="text" placeholder="Company Name" required="required" data-validate="yes" data-type="string">
                  <label for="flight-companyShortcut">Company Code</label><input name="flight-companyShortcut" oninput="validate(this)" type="text" placeholder="Company Shortcut" required="required" data-validate="yes" data-type="string">
                  <label for="flight-price">Price</label><input name="flight-price" oninput="validate(this)" type="text" placeholder="Price" required="required" data-validate="yes" data-type="integer">
                  <label for="flight-currency">Currency</label><input name="flight-currency" oninput="validate(this)" type="text" placeholder="Currency" required="required" data-validate="yes" data-type="string">
                  <div class="modal-schedule">
                    <p> Schedule</p>
                    <input name="schedule-order" oninput="validate(this)" type="text" placeholder="Order" required="required" data-validate="yes" data-type="integer">
                    <input name="schedule-icon" oninput="validate(this)" type="text" placeholder="Airline Icon" required="required" data-validate="yes" data-type="string">
                    <input name="schedule-date" oninput="validate(this)" type="number" placeholder="Date" required="required" data-validate="yes" data-type="integer">
                    <input name="schedule-id" oninput="validate(this)" type="text" placeholder="ID(eg. SAS1)" required="required" data-validate="yes" data-type="string">
                    <input name="schedule-from" oninput="validate(this)" type="text" placeholder="From" required="required" data-validate="yes" data-type="string">
                    <input name="schedule-to" oninput="validate(this)" type="text" placeholder="To" required="required" data-validate="yes" data-type="string">
                    <input name="schedule-waitingTime" oninput="validate(this)" type="number" placeholder="Wait Time" required="required" data-validate="yes" data-type="integer">
                    <input name="schedule-flightTime" oninput="validate(this)" type="number" placeholder="Flying Time" required="required" data-validate="yes" data-type="integer">
                  </div>
                  <button class="modal-btn green-btn" type="submit" onclick="validate(this)">CREATE FLIGHT</button> 
        </form>
        
      </div>
      `

      document.querySelector('body').innerHTML += modalAddForm;
    }
    function validate(oButtonOrInput){
      // IF FORM IS BEING VALIDATED
      if (oButtonOrInput.nodeName == "BUTTON" ){
        let oButton = oButtonOrInput;
        let oForm = oButtonOrInput.parentNode;
        let aElements = oForm.querySelectorAll('[data-validate=yes]')
        for(let i = 0; i < aElements.length; i++){

          let sValidateType = aElements[i].getAttribute('data-type')
          switch( sValidateType ){
            case 'string':
              var sData = aElements[i].value
              if(sData.length < 1){
                aElements[i].classList.add('invalid')
              } else {
                aElements[i].classList.remove('invalid')
              }
            break
            case 'integer':
              var sData = aElements[i].value
              if( /^\d+$/.test(sData) === false ){
                aElements[i].classList.add('invalid')
                break
              } else {
                aElements[i].classList.remove('invalid')
              }
              var sData = parseInt(aElements[i].value) // 55ppp
              // console.log(sData)
              var iMin = parseInt(aElements[i].getAttribute('data-min'))
              // console.log(iMin)
              var iMax = parseInt(aElements[i].getAttribute('data-max'))        
              if(sData < iMin || sData > iMax){
                aElements[i].classList.add('invalid')
              } else {
                aElements[i].classList.remove('invalid')
              }
            break
          }  
        }

        if (oForm.querySelectorAll('.invalid').length > 0) {
          oButton.disabled = true;
        } else {
          oButton.disabled = false;
        }
        return (oButtonOrInput.querySelectorAll('.invalid').length) ? false : true
      }   
      // END FORM VALIDATION
      // IF INPUT IS BEING VALIDATED
      
        else if (oButtonOrInput.nodeName == "INPUT" ){
          
          let oButton = oButtonOrInput.parentNode.parentNode.querySelector('button');
          oButton.disabled = false;
        // console.log(oButtonOrInput.value.length);
        // console.log(oButtonOrInput.nodeName)
        // && oButtonOrInput.value.length > 2
        let oInput = oButtonOrInput;
        let sValidateType = oInput.getAttribute('data-type');
        
        switch( sValidateType ){
          case 'string':
            var sData = oInput.value;
            if( !/^\d+$/.test(sData) === false ) {
              console.log('hello');
            }
        }
      }

    }
  </script>
</body>
</html>