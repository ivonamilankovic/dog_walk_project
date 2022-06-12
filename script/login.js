'use strict';

//login modal
const unameField = document.getElementById('uname');
const passField = document.getElementById('pass');
const loginBtn = document.getElementById('loginBtn');
const errorMessage = document.getElementById('errorMessage');
const goToSignup = document.getElementById('goToSignup');
const forgotPasswordTxt = document.getElementById('forgotPass');
const errorNewPass = document.getElementById('errorNewPass');
const goodmsg = document.getElementById('goodMessages');

//functions
function logUser(){
    //sends data to log user on page
    $.ajax({
        beforeSend: ()=>{
            $('.loader').show();
        },
       url: '../include/login.inc.php',
       method: 'POST',
       data: {
           "user": unameField.value,
           "password": passField.value
       },
        dataType: "JSON",
        success:(response) => {
           //console.log(response);
           if(response.error === "stmtGetUserFailed" ){
               errorMessage.innerText = "Failed to login!";
           }
           else if(response.error === "userNotFound"){
               errorMessage.innerText = "User not found. Try again!";
           }
           else if(response.error === "passwordIncorrect"){
               showError(passField, "Your password is incorrect. Try again!");
           }
           else if(response.error === "userNotVerified"){
               errorMessage.innerText = "User is not verified. To be able to login please verify your profile on your email.";
           }
           else if(response.login === "done"){
               $('.loader').hide();
               window.location.reload();
           }
        },
        error:(msg) => {
           //console.log(msg);
        }
    });
}
function sendCodeForNewPassword(){
    //sends code on persons email for changing password
    if(unameField.value !== "") {
        $.ajax({
            url: '../include/getForgotPasswordCode.inc.php',
            method: 'POST',
            dataType: 'JSON',
            data: {
                "email": unameField.value
            },
            success: (response) => {
                //console.log(response);
                if (response.verify === "sent") {
                    $("#modal_login").modal('hide');
                    goodmsg.innerHTML = "We have sent you link on email to verify yourself!   <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>"
                    goodmsg.classList.add('alert');
                    goodmsg.classList.add('alert-success');
                    goodmsg.classList.add('alert-dismissible');
                } else if (response.error === "stmtSendCodeFailed" || response.error === "stmtFindUserEmailFailed") {
                    errorMessage.innerText = "Failed to send code. Please try again.";
                } else if (response.error === "notExistingAccount"){
                    errorMessage.innerText = "Account with that mail do not have profile.";
                }
                else if(response.ban === "banned user"){
                    $("#modal_login").modal('hide');
                    goodmsg.innerHTML = "You can't log in because administrator has banned you! <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>"
                    goodmsg.classList.add('alert');
                    goodmsg.classList.add('alert-danger');
                }
            },
            error: (msg) => {
                //console.log(msg);
            }

        });
    }
    else {
        errorMessage.innerText = "Enter your email to reset password.";
    }
}

//eventListeners
loginBtn.addEventListener('click',()=>{
    //button for login on page
    errorMessage.innerText = null;
    checkInput(unameField,passField,errorMessage);
    logUser();
});

goToSignup.addEventListener('click', ()=>{
    //switching modals from login to signup
    $("#errorMessage").innerText = null;
    $("#errorMsg").innerText = null;
    $("#modal_login").modal('hide');
    $("#modal_signup").modal('show');

});

passField.addEventListener("keyup", (event) => {
    //if enter is pressed it will automatically trigger button for login
    if (event.keyCode === 13) {
        event.preventDefault();
        loginBtn.click();
    }
});

forgotPasswordTxt.addEventListener('click', () => {
    //if forgot password link is clicked it will send code
    sendCodeForNewPassword();
});
