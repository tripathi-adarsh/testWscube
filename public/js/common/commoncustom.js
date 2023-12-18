/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $(document).ready(function(){
	$(window).scroll(function () {
			if ($(this).scrollTop() > 50) {
				$('#back-to-top').fadeIn();
			} else {
				$('#back-to-top').fadeOut();
			}
		});
		// scroll body to 0px on click
		$('#back-to-top').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 400);
			return false;
		});
});
 function openNav() {
                   document.getElementById("mySidenav").style.width = "250px";
               }

               function closeNav() {
                   document.getElementById("mySidenav").style.width = "0";
               }
               
    function goBack() {
        window.history.back();
        
    }
    
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




/*code for go to top */
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
/*End: code for go to top */
