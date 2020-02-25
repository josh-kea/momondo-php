async function getFromCities(input){
  oFromCityResults = document.querySelector('#fromCityResults')
  oFromCityResults.innerHTML = ""

  var jResponse = await fetch('api-get-from-cities.php')
  var aCities = await jResponse.json();

  let sSearchFor = input.value.toLowerCase();

  if(sSearchFor.length === 0) {
    oFromCityResults.style.display = 'none'
  }

  for(var i = 0; i < aCities.length; i++){
    if(sSearchFor.length > 0 && aCities[i].toLowerCase().includes(sSearchFor)){
      renderFromCity(aCities[i])
      oFromCityResults.style.display = 'grid'
    }
  }

}

function renderFromCity(sCityName){
  oFromCityResults = document.querySelector('#fromCityResults')
  var sDivCityName = `<div class="rendered-city" onclick="selectFromCity(this)">${sCityName}</div>`
  oFromCityResults.innerHTML += sDivCityName
}

function selectFromCity(oCityResult){
  oFromCityResults = document.querySelector('#fromCityResults')
  var sCityName = oCityResult.innerHTML
  document.querySelector('#inputFromCity').value = sCityName
  oFromCityResults.style.display = 'none'

  let oSearchBar = document.querySelector('#search')
  oSearchBar.querySelector('#inputFromCity').classList.remove('invalid')

}

// GET TO CITIES

async function getToCities(input){
  oToCityResults = document.querySelector('#toCityResults')
  oToCityResults.innerHTML = ""

  var jResponse = await fetch('api-get-to-cities.php')
  var aCities = await jResponse.json();

  let sSearchFor = input.value.toLowerCase();

  if(sSearchFor.length === 0) {
    oToCityResults.style.display = 'none'
  }

  for(var i = 0; i < aCities.length; i++){
    if(sSearchFor.length > 0 && aCities[i].toLowerCase().includes(sSearchFor)){
      renderToCity(aCities[i])
      oToCityResults.style.display = 'grid'
    }
  }

}

function renderToCity(sCityName){
  oToCityResults = document.querySelector('#toCityResults')
  var sDivCityName = `<div class="rendered-city" onclick="selectToCity(this)">${sCityName}</div>`
  oToCityResults.innerHTML += sDivCityName
}

function selectToCity(oCityResult){
  oToCityResults = document.querySelector('#toCityResults')
  var sCityName = oCityResult.innerHTML
  document.querySelector('#inputToCity').value = sCityName
  oToCityResults.style.display = 'none'

  let oSearchBar = document.querySelector('#search')
  oSearchBar.querySelector('#inputToCity').classList.remove('invalid')
}


// SEARCHING FOR CITIES FUNCTION

function searchCities(){
  let oSearchBar = document.querySelector('#search')
  let sInputFromCity = oSearchBar.querySelector('#inputFromCity')
  let sInputToCity = oSearchBar.querySelector('#inputToCity')

  let sSearchUrl = `index.php?fromCity=${sInputFromCity.value}&toCity=${sInputToCity.value}`

  if (sInputFromCity.value.length < 1) {
    sInputFromCity.classList.add('invalid');
  } else {
    sInputFromCity.classList.remove('invalid');
  }

  if (sInputToCity.value.length < 1) {
    sInputToCity.classList.add('invalid');
  } else {
    sInputToCity.classList.remove('invalid');
  }

  if (sInputFromCity.value && sInputToCity.value) {
    
    location.replace(sSearchUrl)
  }
}