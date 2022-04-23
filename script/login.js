'use strict';

//login modal
const unameField = document.getElementById('uname');
const passField = document.getElementById('pass');
const loginBtn = document.getElementById('loginBtn');
const errorMessage = document.getElementById('errorMessage');
const goToSignup = document.getElementById('goToSignup');
const forgotPasswordTxt = document.getElementById('forgotPass');
//enter forgot pass code modal
const errorForgotPass = document.getElementById('errorForgotPass');
const forgotPassCodeBtn = document.getElementById('forgotPassCodeBtn');
const forgotPassField = document.getElementById('fp_code');
//enter new pass modal
const newPassBtn = document.getElementById('newPassBtn');
const newPass1 = document.getElementById('newPass1');
const newPass2 = document.getElementById('newPass2');
const errorNewPass = document.getElementById('errorNewPass');


//functions
function showSuccess(input){
    //shows green border on input
    input.classList.remove('is-invalid');
    input.classList.add('is-valid');
}
function showError(input, mess){
    //shows red border on input and error message
    input.classList.remove('is-valid');
    input.classList.add('is-invalid');
    errorMessage.innerText = mess.toString();
    errorNewPass.innerText = mess.toString();
}
function checkInput(username, password){
    //checks if fields are empty
    if (username.value === "" && password.value === ""){
        showError(username,"Every field is required!");
        showError(password,"Every field is required!");
        return;
    }

    if(username.value === ""){
        showError(username,"Username is required!");
    }
    else{
        checkEmail(username);
    }

    if(password.value === ""){
        showError(password, "Password is required!");
    }
    else{
        checkPassLength(password);
    }

    //if both are good show no error message
    if(username.classList.contains('success') && password.classList.contains('success')){
        errorMessage.innerText = null;
    }
}
function checkEmail(input){
    //checks if email is in correct format
    const re = /^[a-z][a-zA-Z0-9_.]*(\.[a-zA-Z][a-zA-Z0-9_.]*)?@[a-z][a-zA-Z-0-9]*\.[a-z]+(\.[a-z]+)?$/;
    if(re.test(input.value.trim())){
        showSuccess(input);
    }
    else{
        showError(input, 'Email is not valid.');
    }
}
function checkPassLength(input){
    //checks length of password
    if(input.value.length < 6 || input.value.length > 15){
        showError(input, "Password must be between 6 and 15 characters!");
    }
    else{
        showSuccess(input);
    }
}

function logUser(){
    //sends data to log user on page
    $.ajax({
       url: '../include/login.inc.php',
       method: 'POST',
       data: {
           "user": unameField.value,
           "password": passField.value
       },
        dataType: "JSON",
        success:(response) => {
           console.log(response);
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
               const element = document.createElement('span');
               const text = document.createTextNode('here');
               element.appendChild(text);
               errorMessage.innerText = "User is not verified. To be able to login please verify your profile ";
               errorMessage.appendChild(element);
               document.querySelector('#errorMessage span').addEventListener('click', () => {
                  getNewVerificationCode();
               });
           }
           else if(response.login === "done"){
               window.location.reload();
           }
        },
        error:(msg) => {
           console.log(msg);
        }
    });
}
function getNewVerificationCode(){
    //sends new verification code to persons email
    $.ajax({
       url: '../include/getNewVerificationCode.inc.php',
        method: 'POST',
        dataType: "JSON",
        data: {
           "email": unameField.value
        },
        success: (response) => {
           console.log(response);
           if(response.error === "stmtSendCodeFailed" || response.error === "stmtFindUserEmailFailed"){
               errorMessage.innerText = "Failed to send new code. Please try again.";
           }
           else if(response.error === "notExistingAccount"){
               errorMessage.innerText = "Account with that mail do not have profile.";
           }
           else if(response.verify === "sent"){
               $("#modal_login").modal('hide');
               $("#modal_verification").modal('show');
           }
        },
        error: (msg) => {
           console.log(msg);
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
                console.log(response);
                if (response.verify === "sent") {
                    $("#modal_login").modal('hide');
                    $("#modal_forgotPassCode").modal('show');
                } else if (response.error === "stmtSendCodeFailed" || response.error === "stmtFindUserEmailFailed") {
                    errorMessage.innerText = "Failed to send code. Please try again.";
                } else if (response.error === "notExistingAccount"){
                    errorMessage.innerText = "Account with that mail do not have profile.";
                }
            },
            error: (msg) => {
                console.log(msg);
            }

        });
    }
    else {
        errorMessage.innerText = "Enter your email to reset password.";
    }
}
function checkForgotPassCode() {
    //checks if codes for changing passwords match
    if(forgotPassField.value !== "" && forgotPassField.value.length === 6){
        $.ajax({
            url: '../include/verifyForgotPassCode.inc.php',
            method: 'POST',
            dataType: "JSON",
            data: {
                "fpCode" : forgotPassField.value
            },
            success: (response) => {
                console.log(response);
                if(response.verify === "done"){
                    $("#modal_forgotPassCode").modal('hide');
                    $("#modal_changePassword").modal('show');
                    $("#errorNewPass").innerText = null;
                }
                else if(response.error === "stmtCheckCodeFailed" || response.error === "stmtGetVerifiedFailed"){
                    errorForgotPass.innerText = "Failed to check code. Please try again.";
                }
            },
            error: (msg) => {
                console.log(msg);
            }

        });
    }
    else{
        errorForgotPass.innerText = "Code must have 6 digits.";
    }
}
function submitNewPassword(){
    //changes password
    $.ajax({
        url: '../include/changePassword.inc.php',
        method: 'POST',
        dataType: "JSON",
        data:{
            "newPass1": newPass1.value,
            "newPass2": newPass2.value,
            "fpCode": forgotPassField.value
        },
        success: (response) => {
            console.log(response);
            if(response.newPassword === "set"){
                $("#modal_changePassword").modal('hide');
                $("#modal_login").modal('show');
                $("#errorMessage").innerText = null;
            }else if(response.error === "stmtSetNewPasswordFailed"){
                errorNewPass.innerText = "Failed to set new password. Try again.";
            }
        },
        error: (msg) => {
            console.log(msg);
        }
    });
}

//eventListeners
loginBtn.addEventListener('click',()=>{
    //button for login on page
    errorMessage.innerText = null;
    checkInput(unameField,passField);
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
    errorForgotPass.innerText = null;
    sendCodeForNewPassword();
});

forgotPassCodeBtn.addEventListener('click', () => {
    //button to check if codes matches
   checkForgotPassCode();
});

newPassBtn.addEventListener('click', () => {
    //button for changing password to something new
    checkPassLength(newPass1);
    checkPassLength(newPass2);
    checkPassMatch(newPass1,newPass2);
    submitNewPassword();
});