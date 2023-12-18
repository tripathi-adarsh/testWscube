/* For Local Server*/
// var base_url = window.location.origin + "/alib/"; //var base_url = '{!! url() !!}';
var base_url = window.URL;
var session_role = $('#custom_session').val();
/* For Production Server*/
// var base_url = window.location.origin + "/"; 
/* Filter Partner Role based on condition */

// This will return selected index. 
function resetAll() {
    $('#custom_alerts').empty(); // Removing alerts message after x sec
} 

/*for dob check for less than today date */
$("#dob").change(function() {      
    var dobDate = document.getElementById("dob").value;
    var today = new Date();
    if ((Date.parse(dobDate) >= Date.parse(today))) {
        alert("DOB date should be less than today date.");
        document.getElementById("dob").value = "";               
       return ;
    }
});
/*End: for dob check for less than today date */

/*check email */
function checkMail(user){   
    console.log(user.email);
    var email = user.email;
    if (email==null) {
        console.log(user.email,'email');
        $('#cust-text-email').empty();
        $('#cust-text-email').replaceWith('<p class="text-center" id="cust-text-email">Please provide valid email to proceed!<br> <span class="text-danger"> </span></p>');

        $('#custemail_id').replaceWith('<input type="email" class="cus-register-select-container px-2" name="custemail_id" id="custemail_id" value="" placeholder="Enter email." required>');
        $('#cus_update_email').replaceWith('<button type="button" id="cus_update_email" class="custom-info cust-alert-popup-btn-margin cust-alert-popup-btn" onclick="updateEmail('+user.id+')">Ok</button>');
        $('#checkEmail').modal();
    }
    if (email && user.email_verified_at==null) {
        console.log(user.email_verified_at,'very');
        $('#cust-text-email').replaceWith('<p class="text-center" id="cust-text-email">Before proceeding, please check your email for a verification link. If you did not receive the email, please click resend button to get fresh verification link email.</p>');
        $('#custemail_id').replaceWith('<input type="email" class="cus-register-select-container px-2" name="custemail_id" id="custemail_id" value="'+email+'" placeholder="Enter email." readonly>');
        $('#cus_update_email').replaceWith('<button type="button" id="cus_update_email" class="custom-info cust-alert-popup-btn-margin cust-alert-popup-btn" data-dismiss="modal" onclick="resendEmail('+user.id+')">Resend</button>');
        $('#checkEmail').modal();
    }
}

/*if user has no mail then user can update thier mail */
function updateEmail(user_id){
    var email_id = $('#custemail_id').val(); 
    if(!email_id){
        alert("Please enter valid email.");
        return ;

    }
    /*check email is validate or not with pattern */
    var pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
    if(pattern.test(email_id) ==false){
        alert("Please enter valid email.");
        return ;
    }

    $.ajax({
        url:"updateEmail",
        type: "GET",
        dataType: "json",
        data:{            
            'user_id':user_id,
            'email_id':email_id,
        },
        cache: false,
        success: function(result) {
            if(result.data==0){
                $('#cust-text-email').replaceWith('<p class="text-center" id="cust-text-email">Please provide valid email to proceed!<br> <span class="text-danger">'+result.error+' </span></p>');
                $('#custemail_id').replaceWith('<input type="email" class="cus-register-select-container px-2" name="custemail_id" id="custemail_id" value="'+email+'" placeholder="Enter email." readonly>');
                $('#cus_update_email').replaceWith('<button type="button" id="cus_update_email" class="custom-info cust-alert-popup-btn-margin cust-alert-popup-btn" data-dismiss="modal" onclick="verifyEmail('+user.id+')">Ok</button>');
                $('#checkEmail').modal();
            }else if(result.data==1){
                $('#cust_text_p').replaceWith('<p class="text-center" id="cust_text_p">'+result.success+'</p>');
                $('#proceed_btn_id').replaceWith('<button type="button" id="proceed_btn_id" class="custom-info cust-alert-popup-btn-margin cust-alert-popup-btn" data-dismiss="modal" onclick="verifyEmail('+user_id+')">Ok</button>');
                $('#proceedMail').modal();
            }            
        }
    });
}

/*call verification notice blade to resend new verification mail */
function verifyEmail(user_id){
    // window.location = "cust-req-otp";   
    $.ajax({
        url:"cust-req-otp",
        type: "GET",
        dataType: "json",
        data:{            
            'user_id':user_id,
        },
        cache: false,
        success: function(result) {
             console.log(result);
            if(result.data==0){                
                $('#checkEmail').modal();
            }else if(result.data==1){
                $('#uniqueId_2').replaceWith('<input  name="uniqueId" id="uniqueId_2" type="hidden" value="'+result.otp_req.uniqueId+'">');
                $('#uniqueId_1').replaceWith('<input  name="uniqueId" id="uniqueId_1" type="hidden" value="'+result.otp_req.uniqueId+'">');
                $('#otpProceedMail').modal();
            }            
        }
    });
}

/*validate otp for email   */
function validateOtp(){
    var uniqueId = $('#uniqueId_1').val();
    var cust_otp = $('#cust_otp').val();
    $.ajax({
        url:"custotp-validate",
        type: "GET",
        dataType: "json",
        data:{            
            'uniqueId':uniqueId,
            'otp':cust_otp,
        },
        cache: false,
        success: function(result) {
            console.log(result);
            if(result.data==0){
                $('#cust-otp-text').replaceWith('<p id="cust-otp-text" class="m-0 text-danger" style="">'+result.error+'</p>');
            }else{
                $('#cust-otp-text').replaceWith('<p id="cust-otp-text" class="m-0 text-success" style="">'+result.success+'</p>');
                setInterval(function(){ window.location=''; }, 2000);
           }            
        }
    });
}
/*End: validate otp for email   */

/*resend new verification email and go to login page */
function resendEmail(user_id){
    // window.location = "verification-notice";   
    // var uniqueId = $('#uniqueId_2').val();
    $.ajax({
        url:"custotp-resend",
        type: "GET",
        dataType: "json",
        data:{            
            'user_id':user_id,
        },
        cache: false,
        success: function(result) {
             console.log(result);
            if(result.data==0){                
                $('#checkEmail').modal();
            }else if(result.data==1){
                console.log('resend');
                document.getElementById('cust_timer').innerHTML='';
                timer(600)
                $('#cust-otp-text').replaceWith('<p id="cust-otp-text" class="m-0 text-success" style="">Otp resend to your email id , please check your email for new otp.</p>');
                $('#resend-otp').replaceWith('<button class="btn btn-success float-right mb-3"  type="submit" id="resend-otp" onclick="resendOTP('+user_id+')">Resend OTP</button>');
                $('#uniqueId_2').replaceWith('<input  name="uniqueId" id="uniqueId_2" type="hidden" value="'+result.otp_req.uniqueId+'">');
                $('#uniqueId_1').replaceWith('<input  name="uniqueId" id="uniqueId_1" type="hidden" value="'+result.otp_req.uniqueId+'">');
                $('#otpProceedMail').modal();
            }            
        }
    });   
}

/*resend mail for otp*/
function resendOTP(user_id){
    var uniqueId = $('#uniqueId_2').val();
    $.ajax({
        url:"custotp-resend",
        type: "GET",
        dataType: "json",
        data:{            
            'uniqueId':uniqueId,
        },
        cache: false,
        success: function(result) {
             console.log(result);
            if(result.data==0){                
                $('#checkEmail').modal();
            }else if(result.data==1){
                console.log('resend');
                document.getElementById('cust_timer').innerHTML=' ';
                timer(600)
                $('#cust-otp-text').replaceWith('<p id="cust-otp-text" class="m-0 text-success" style="">Otp resend to your email id , please check your email for new otp.</p>');
                $('#resend-otp').replaceWith('<button class="btn btn-success float-right mb-3"  type="submit" id="resend-otp" onclick="resendOTP('+user_id+')">Resend OTP</button>');
                $('#uniqueId_2').replaceWith('<input  name="uniqueId" id="uniqueId_2" type="hidden" value="'+result.otp_req.uniqueId+'">');
                $('#uniqueId_1').replaceWith('<input  name="uniqueId" id="uniqueId_1" type="hidden" value="'+result.otp_req.uniqueId+'">');
                $('#otpProceedMail').modal();
            }            
        }
    });   
}



/*for set timer */

let timerOn = true;

function timer(remaining) {
    var m = Math.floor(remaining / 60);
    var s = remaining % 60;

    m = m < 10 ? '0' + m : m;
    s = s < 10 ? '0' + s : s;
    document.getElementById('cust_timer').innerHTML = m + ':' + s;
    remaining -= 1;

    if(remaining >= 0 && timerOn) {
        setTimeout(function() {
            timer(remaining);
        }, 1000);
        return;
    }

    if(!timerOn) {
        // Do validate stuff here
        return;
    }

    // Do timeout stuff here
    alert('Timeout for otp');
}

//timer(300);

/*End: for set timer */

