'use strict';

const message = document.getElementById('message');
const errorMsg = document.getElementById('errorMsg');
const errorVerify = document.getElementById('errorVerification');
const signupBtn = document.getElementById('signupBtn');
const verifyBtn = document.getElementById('verifyBtn');

const codeField = document.getElementById('ver_code');
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
function showSuccess1(input){
    //shows green border on input
    input.classList.remove('is-invalid');
    input.classList.add('is-valid');
}
function showError1(input, mess){
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
                        showError1(input, `${input.placeholder} is required!`);
                        flag++;
                    } else {
                        showSuccess1(input);
                    }
                    break;
                case 'email':
                    if (input.value === "") {
                        showError1(input, `${input.placeholder} is required!`);
                        flag++;
                    } else {
                        checkEmail(input);
                    }
                    break;
                case 'password':
                    if (input.value === "") {
                        showError1(input, `${input.placeholder} is required!`);
                        flag++;
                    } else {
                        checkPassLength(input);
                    }
                    break;
                case 'tel':
                    if (input.value === "") {
                        showError1(input, `${input.placeholder} is required!`);
                        flag++;
                    } else {
                        checkPhone(input);
                    }
                    break;
                case 'number':
                    if(input.value === ""){
                        showError1(input, `${input.placeholder} is required!`);
                        flag++;
                    }else{
                        checkPostalCode(input);
                    }
                    break;
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
        showSuccess1(input);
    }
    else{
        showError1(input, 'Email is not valid.');
    }
}
function checkPassLength(input){
    //checks length of password
    if(input.value.length < 6 || input.value.length > 15){
        showError1(input, "Password must be between 6 and 15 characters!");
    }
    else{
        showSuccess1(input);
    }
}
function checkPassMatch(pass1,pass2){
    //check if passwords match
    if(pass1.value !== "" && pass2.value !== "" && pass1.value === pass2.value){
        showSuccess1(pass1);
        showSuccess1(pass2);
        checkPassLength(pass1);
        checkPassLength(pass2);
    }
    else{
        showError1(pass2,"Passwords do not match!");
    }
}
function checkPhone(input){
    //checks length of phone number
    if(input.value.length !== 10){
        showError1(input, "Phone number must have 10 digits!");
    }
    else if(isNaN(input.value)){
        showError1(input, "Phone number must have digits, not letters!")
    }
    else {
        showSuccess1(input);
    }
}
function checkPostalCode(input){
    if(input.value.length !== 5){
        showError1(input, "Postal code must have 5 digits!");
    }
    else{
        showSuccess1(input);
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

function makeUser(){
    $.ajax({
        url: './include/signup.inc.php',
        method: 'POST',
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
        dataType: "JSON",
        success:(response) => {
            console.log(response); //{"all":"done"} if everything is done successfully, if not {"error" : "...."}
            //if any statement fails, creating user is failing
            if(response.error === "stmtCreateAddressFail" || response.error === "stmtLastAddressIDFail" || response.error === "stmtCreateUserFail" || response.error === "stmtIsEmailTakenFail"){
                errorMsg.innerText = "Failed creating user. Please try again!";
            }
            else if(response.error === "emailAlreadyTaken"){
                //if email is taken, user wont be made
                showError1(emailField,"Email is already taken. Please choose another.");
            }
            else if(response.signup === "done"){
                $("#modal_signup").modal('hide');
                $("#modal_verification").modal('show');
            }
        },
        error: (msg) => {
            console.log(msg);
        }
    });

}

function checkVerificationCode(){
    if(codeField.value !== "" && codeField.value.length === 6){
        $.ajax({
           url: './include/verify.inc.php',
           method: 'POST',
           data: {
               "code" : codeField.value
           },
           dataType: "JSON",
           success: (response) =>{
               console.log(response);
               if (response.verify === "done"){
                   $("#modal_verification").modal('hide');
                   $("#modal_login").modal('show');
                   message.innerText = "You have successfully signed up . Now you can log in!";
               }
               else if(response.error === "stmtCheckCodeFailed" || response.error === "stmtGetVerifiedFailed"){
                   errorVerify.innerText = "Failed to verify account. Please try again.";
               }
           },
            error: (msg) => {
               console.log(msg);
            }
        });
    }
    else{
        showError1(codeField, "");
        errorVerify.innerText = "Verification code must be 6 digits!";
    }
}

//eventListeners

signupBtn.addEventListener('click',()=>{
    errorMsg.innerText = null;
    checkInputs([firstNameField,lastNameField,emailField,pass1Field,pass2Field,phoneField,addressField, cityField, postalCodeField]);
    checkPassMatch(pass1Field,pass2Field);
    getRoleOfUser();
    makeUser();
});

goToLogin.addEventListener('click', ()=>{
    $("#errorMessage").innerText = null;
    $("#errorMsg").innerText = null;
    $("#modal_signup").modal('hide');
    $("#modal_login").modal('show');
});

verifyBtn.addEventListener('click', () => {
   checkVerificationCode();
});
