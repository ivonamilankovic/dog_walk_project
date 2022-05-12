'use strict';

const password1 = document.getElementById('newPassword1');
const password2 = document.getElementById('newPassword2');
const email = document.getElementById('emailP');
const changeBtn = document.getElementById('changePasswordBtn');
const newErrorMessage = document.getElementById('newErrorMessage');
//functions
function showPassError(input, msg){
    //shows red border on input and error message
    input.classList.remove('is-valid');
    input.classList.add('is-invalid');
    newErrorMessage.innerText = msg.toString();
}
function showPassSuccess(input){
    //shows green border on input
    input.classList.remove('is-invalid');
    input.classList.add('is-valid');
}
function isEmpty(input){
    if(input.value === ""){
        showPassError(input,"Fill out fields!");
    }
}
function checkPassLength(input){
    //checks length of password
    if(input.value.length < 6 || input.value.length > 15){
        showPassError(input, "Password must be between 6 and 15 characters!");
    }
    else{
        showPassSuccess(input);
    }
}
function checkPassMatch(pass1,pass2){
    //check if passwords match
    if(pass1.value !== "" && pass2.value !== "" && pass1.value === pass2.value){
        showPassSuccess(pass1);
        showPassSuccess(pass2);
        checkPassLength(pass1);
        checkPassLength(pass2);
    }
    else{
        showPassError(pass2,"Passwords do not match!");
    }
}
function changePassword(){
    //changes password
    $.ajax({
        url: '../include/changePassword.inc.php',
        method: 'POST',
        dataType: "JSON",
        data:{
            "password1": password1.value,
            "password2": password2.value,
            "email": email.value
        },
        success: (response) => {
            console.log(response);
            if(response.newPassword === "set"){
                $("#newErrorMessage").innerText = null;
                alert("You have succesfully changed your password!");
            }else if(response.error === "stmtSetNewPasswordFailed"){
                errorNewPass.innerText = "Failed to set new password. Try again.";
            }
        },
        error: (msg) => {
            console.log(msg);
        }
    });
}

//event listener
changeBtn.addEventListener('click', ()=> {
    isEmpty(password1);
    isEmpty(password2);
   checkPassLength(password1);
   checkPassLength(password2);
   checkPassMatch(password1, password2);
   changePassword();
});

password2.addEventListener("keyup", (event) => {
    //if enter is pressed it will automatically trigger button for login
    if (event.keyCode === 13) {
        event.preventDefault();
        loginBtn.click();
    }
});