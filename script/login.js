'use strict';

const unameField = document.getElementById('uname');
const passField = document.getElementById('pass');
const loginBtn = document.getElementById('loginBtn');
const errorMessage = document.getElementById('errorMessage');
const goToSignup = document.getElementById('goToSignup');

//functions
function showSuccess(input){
    //shows green border on input
    input.classList.remove('error');
    input.classList.add('success');
}
function showError(input, mess){
    //shows red border on input and error message
    input.classList.remove('success');
    input.classList.add('error');
    errorMessage.innerText = mess.toString();
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

//eventListeners

loginBtn.addEventListener('click',()=>{
    checkInput(unameField,passField);
});

goToSignup.addEventListener('click', ()=>{
    $("#modal_login").modal('hide');
   $("#modal_signup").modal('show');
});

