/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                   
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || (charCode== 32))
                    return true;
                else
                    return false;
               
            }
            catch (err) {
                alert(err.Description);
            }
        }
        
function onlyNumbers(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}

function validatePAN(evt){
    if(evt.srcElement.value.length == 10)
    {
    var panValue = evt.srcElement.value;
    var panPattern =/^([A-Za-z]{5})+([0-9]{4})+([A-Za-z]{1})$/;
   if( !panPattern.test(panValue) ) {
       alert('Entered PAN Number is Invalid!')
  }
 }
}



function onlyAlphaNumeric(evt){
    var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
   //Regex for Valid Characters i.e. Alphabets and Numbers.
  var regex = /^[A-Za-z0-9]+$/;
  if( !regex.test(key) ) {
      
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
    
}

 function fillprice()
{                                                                                        
   document.getElementById('service_fees').selectedIndex = document.getElementById('service_id').selectedIndex;
}

function fillname()
{       
    
   document.getElementById('service_id').selectedIndex = document.getElementById('service_fees').selectedIndex;
   
}


    



















