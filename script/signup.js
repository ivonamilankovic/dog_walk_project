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
function getRoleOfUser(){
    //gets role of user by seeing which radiobutton is selected
    if(roleUser.checked){
        role = "customer";
    }
    else if(roleWalker.checked){
        role = "walker";
    }
}
function makeUser(){
    //send data to make new user in db
    $.ajax({
        url: '../include/signup.inc.php',
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
            console.log(response);
            //if any statement fails, creating user is failing
            if(response.error === "stmtCreateAddressFail" || response.error === "stmtLastAddressIDFail" || response.error === "stmtCreateUserFail" || response.error === "stmtIsEmailTakenFail" || response.error === "stmtCreateWalkerDetailsFail"){
                errorMsg.innerText = "Failed creating user. Please try again!";
            }
            else if(response.error === "emailAlreadyTaken"){
                //if email is taken, user wont be made
                showError(emailField,"Email is already taken. Please choose another.", errorMsg);
            }
            //if everything is fine it opens modal to enter verification code
            else if(response.signup === "done" || response.verify === "sent"){
                $("#modal_signup").modal('hide');
                goodmsg.innerHTML = "We have sent you link on email to verify yourself!   <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>"
                goodmsg.classList.add('alert');
                goodmsg.classList.add('alert-success');
            }
        },
        error: (msg) => {
            console.log(msg);
        }
    });

}

//eventListeners
signupBtn.addEventListener('click',()=>{
    //button for signup
    errorMsg.innerText = null;
    checkPassMatch(pass1Field,pass2Field,errorMsg);
    checkInputsArray([firstNameField,lastNameField,emailField,pass1Field,pass2Field,phoneField,addressField, cityField, postalCodeField],errorMsg);
    getRoleOfUser();
    makeUser();
});

goToLogin.addEventListener('click', ()=>{
    //switches modals from signup to login modal
    $("#errorMessage").innerText = null;
    $("#errorMsg").innerText = null;
    $("#modal_signup").modal('hide');
    $("#modal_login").modal('show');
});

