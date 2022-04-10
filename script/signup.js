'use strict';

const errorMsg = document.getElementById('errorMsg');
const signupBtn = document.getElementById('signupBtn');

const firstNameField = document.getElementById('firstName');
const lastNameField = document.getElementById('lastName');
const emailField = document.getElementById('email');
const pass1Field = document.getElementById('pass1');
const pass2Field = document.getElementById('pass2');
const phoneField = document.getElementById('phone');
const addressField = document.getElementById('address');
const cityField = document.getElementById('city');
const postalCodeField = document.getElementById('postalCode');
const goToLogin = document.getElementById('goToLogin');

const roleUser = document.getElementById('roleUser');
const roleWalker = document.getElementById('roleWalker');
let role;

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
    errorMsg.innerText = mess.toString();
}

function checkInputs(inputArray){
    //checks if fields are empty

    let flag = 0;
        inputArray.forEach(input => {
            switch (input.type) {
                case 'text':
                    if (input.value === "") {
                        showError(input, `${input.placeholder} is required!`);
                        flag++;
                    } else {
                        showSuccess(input);
                    }
                    break;
                case 'email':
                    if (input.value === "") {
                        showError(input, `${input.placeholder} is required!`);
                        flag++;
                    } else {
                        checkEmail(input);
                    }
                    break;
                case 'password':
                    if (input.value === "") {
                        showError(input, `${input.placeholder} is required!`);
                        flag++;
                    } else {
                        checkPassLength(input);
                    }
                    checkPassMatch(pass1Field, pass2Field);
                    break;
                case 'tel':
                    if (input.value === "") {
                        showError(input, `${input.placeholder} is required!`);
                        flag++;
                    } else {
                        checkPhone(input);
                    }
                    break;
                case 'number':
                    if(input.value === ""){
                        showError(input, `${input.placeholder} is required!`);
                        flag++;
                    }else{
                        checkPostalCode(input);
                    }
                    break;
                default:
                    errorMsg.innerText = "Fill out all fields!";
            }

        });
        if(flag){
            errorMsg.innerText = "Fill out all fields!";
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
    if(pass1.value !== "" && pass2.value !== "" && pass1.value === pass2.value){
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
function checkPostalCode(input){
    if(input.value.length !== 5){
        showError(input, "Postal code must have 5 digits!");
    }
    else{
        showSuccess(input);
    }
}
function getRoleOfUser(){
    if(roleUser.checked){
        role = "customer";
    }
    else if(roleWalker.checked){
        role = "walker";
    }
}

function send(){
    $.ajax({
        url: './include/signup.inc.php',
        method: 'post',
        data: {
            "role": role,
            "firstName": firstNameField.value,
            "lastName": lastNameField.value,
            "email": emailField.value,
            "pass1": pass1Field.value,
            "pass2": pass2Field.value,
            "phone": phoneField.value,
            "address": addressField.value,
            "city": cityField.value,
            "postalCode": postalCodeField.value
        },
        success:(response) => {
            console.log(response);
        }
    });

}

//eventListeners

signupBtn.addEventListener('click',()=>{
    errorMsg.innerText = null;
    checkInputs([firstNameField,lastNameField,emailField,pass1Field,pass2Field,phoneField,addressField, cityField, postalCodeField]);
    getRoleOfUser();
    send();
});

goToLogin.addEventListener('click', ()=>{
    $("#modal_signup").modal('hide');
    $("#modal_login").modal('show');
})

