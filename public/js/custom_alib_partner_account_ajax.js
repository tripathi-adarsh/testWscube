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


function resetAllFile() {
    $('#file-progress-bar').empty(); // Removing alerts message after x sec
}



/*Start : Compare old password sushil 20/07/2020 */
function comparePassword(no) {            
    if ($('#new_password').val() != $('#confirm_password').val()) {
        var message = "Mismatch password!";
            $('#compare_password_error').replaceWith('<p class="text-danger" id="compare_password_error">'+ message +'</p>');
    }else{
        var message = "Match password!";
        $('#compare_password_error').replaceWith('<p class="text-success" id="compare_password_error">'+ message +'</p>');
    }
       
}
/*End : Compare old password sushil 20/07/2020 */
/*Start : Show and hide  password sushil 21/07/2020 */
const togglePassword = document.querySelector('#togglePassword');
const password = document.querySelector('#old_password');
togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});


const togglePasswordNew = document.querySelector('#togglePasswordNew');
const passwordNew = document.querySelector('#new_password');
togglePasswordNew.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = passwordNew.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordNew.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
/*End : Show and hide  password sushil 21/07/2020 */
