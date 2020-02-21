async function getFromCities(){
  oFromCityResults = document.querySelector('#fromCityResults')
  oFromCityResults.innerHTML = ""

  var jResponse = fetch('api-get-from-cities.php')
  var aCities = await jResponse.json()

  for(var i = 0; i < aCities.length; i++){
    renderFromCity( aCities[i] )
  }
  oFromCityResults.style.display = 'grid'
}
// Show the city in the "drop down"
function renderFromCity(sCityName){
  oFromCityResults = document.querySelector('#fromCityResults')
  var sDivCityName = `<div>${sCityName}</div>`
  oFromCityResults.innerHTML += sDivCityName
}