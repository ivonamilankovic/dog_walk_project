'use strict';

const errorMsg = document.getElementById('errorMsg');
const signupBtn = document.getElementById('signupBtn');

//const roleUser = document.getElementById('roleUser');
//const roleWalker = document.getElementById('roleWalker');
const firstNameField = document.getElementById('firstName');
const lastNameField = document.getElementById('lastName');
const emailField = document.getElementById('email');
const pass1Field = document.getElementById('pass1');
const pass2Field = document.getElementById('pass2');
const phoneField = document.getElementById('phone');
const addressField = document.getElementById('address');

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
    errorMsg.innerText = mess.toString();
}

function checkInputs(inputArray){
    //checks if fields are empty
    let flag = 0;
    inputArray.forEach(input =>{
        if(input.value === null || input.value === ""){
            flag++;
        }
    });
    if(flag === inputArray.length || flag > 1 ){
        errorMsg.innerText = "Fill out all fields!";
    }
    else {
        inputArray.forEach(input => {
            switch (input.type) {
                case 'text':
                    if (input.value === "") {
                        showError(input, `${input.placeholder} is required!`);
                    } else {
                        showSuccess(input);
                    }
                    break;
                case 'email':
                    if (input.value === "") {
                        showError(input, `${input.placeholder} is required!`);
                    } else {
                        checkEmail(input);
                    }
                    break;
                case 'password':
                    if (input.value === "") {
                        showError(input, `${input.placeholder} is required!`);
                    } else {
                        checkPassLength(input);
                    }
                    checkPassMatch(pass1Field,pass2Field);
                    break;
                case 'tel':
                    if (input.value === "") {
                        showError(input, `${input.placeholder} is required!`);
                    } else {
                        checkPhone(input);
                    }
                    break;
                default:
                    errorMsg.innerText = "Fill out all fields!";
            }

        });
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
function checkPassMatch(pass1,pass2){
    //check if passwords match
    if(pass1.value != null && pass2.value != null && pass1.value === pass2.value){
        showSuccess(pass1);
        showSuccess(pass2);
    }
    else{
        showError(pass2,"Passwords do not match!");
    }
}
function checkPhone(input){
    //checks length of phone number
    if(input.value.length !== 10){
        showError(input, "Phone number must have 10 digits!");
    }
    else if(isNaN(input.value)){
        showError(input, "Phone number must have digits, not letters!")
    }
    else {
        showSuccess(input);
    }
}


//eventListeners

signupBtn.addEventListener('click',()=>{
    errorMsg.innerText = null;
    checkInputs([firstNameField,lastNameField,emailField,pass1Field,pass2Field,phoneField,addressField]);
});

