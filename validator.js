// the form I submit



function validate(oButtonOrInput){
  console.log('lol');
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
      
      let oButton = oButtonOrInput.parentNode.querySelector('button');
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



