'use strict';

const chooseYourStatusDiv = document.getElementById('chooseYourStatus');
const inputsForEveryone = document.getElementById('inputsForEveryone');
const inputsForWalkers = document.getElementById('inputsForWalkers');

const errorMsg = document.getElementById('errorMsg');
const signupBtnUser = document.getElementById('signupBtnUser');
const signupBtnWalker = document.getElementById('signupBtnWalker');
const backBtn = document.getElementById('back');
const regularUserBtn = document.getElementById('roleUser');
const walkerUserBtn = document.getElementById('roleWalker');

const firstNameField = document.getElementById('firstName');
const lastNameField = document.getElementById('lastName');
const emailField = document.getElementById('email');
const pass1Field = document.getElementById('pass1');
const pass2Field = document.getElementById('pass2');
const phoneField = document.getElementById('phone');
const addressField = document.getElementById('address');
const favBreedField = document.getElementById('favBreed');
const descriptionField = document.getElementById('description');
const picture = document.getElementById('picture');

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
    if(flag === inputArray.length){
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
                case 'file':
                    checkPicture(input);
                    break;
                case 'textarea':
                    checkDescription(descriptionField);
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
    if(pass1.value != null && pass2 != null && pass1 === pass2.value){
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
    else {
        showSuccess(input);
    }
}
function checkPicture(input){
    //checks if picture is added and is it in correct file type
    if(input.value === null){
        showError(input,"Picture must be entered");
    }
    //?????????????file type????????????????
    //jquery?

}
function checkDescription(input){
    if(input.value === null){
        showError(input, "Description is required!");
    }
    else if(input.value.length < 10 ){
        showError(input, "Description must be longer!");
    }
    else if(input.value.length > 255){
        showError(input, "Description must be shorter!")
    }
    else{
        showSuccess(input);
    }
}


//eventListeners
regularUserBtn.addEventListener('click',()=>{
    chooseYourStatusDiv.classList.remove('show');
    chooseYourStatusDiv.classList.add('dontShow');
    backBtn.classList.remove('dontShow');
    backBtn.classList.add('show');
    inputsForEveryone.classList.remove('dontShow');
    inputsForEveryone.classList.add('show');
    signupBtnUser.classList.remove('dontShow');
    signupBtnUser.classList.add('show');
    signupBtnWalker.classList.remove('show');
    signupBtnWalker.classList.add('dontShow');
    errorMsg.innerText = null;
});
walkerUserBtn.addEventListener('click', ()=>{
    chooseYourStatusDiv.classList.remove('show');
    chooseYourStatusDiv.classList.add('dontShow');
    backBtn.classList.remove('dontShow');
    backBtn.classList.add('show');
    inputsForEveryone.classList.remove('dontShow');
    inputsForEveryone.classList.add('show');
    inputsForWalkers.classList.remove('dontShow');
    inputsForWalkers.classList.add('show');
    signupBtnUser.classList.add('dontShow');
    signupBtnUser.classList.remove('show');
    signupBtnWalker.classList.add('show');
    signupBtnWalker.classList.remove('dontShow');
    errorMsg.innerText = null;
});
backBtn.addEventListener('click',()=>{
    chooseYourStatusDiv.classList.remove('dontShow');
    chooseYourStatusDiv.classList.add('show');
    backBtn.classList.remove('show');
    backBtn.classList.add('dontShow');
    inputsForEveryone.classList.remove('show');
    inputsForEveryone.classList.add('dontShow');
    if(inputsForWalkers.classList.contains('show')) {
        inputsForWalkers.classList.remove('show');
        inputsForWalkers.classList.add('dontShow');
        signupBtnWalker.classList.remove('show');
        signupBtnWalker.classList.add('dontShow');
    }
    signupBtnUser.classList.remove('show');
    signupBtnUser.classList.add('dontShow');
    errorMsg.innerText = null;
});

signupBtnUser.addEventListener('click',()=>{
    errorMsg.innerText = null;
    checkInputs([firstNameField,lastNameField,emailField,pass1Field,pass2Field,phoneField,addressField]);
});

signupBtnWalker.addEventListener('click', ()=>{
    errorMsg.innerText = null;
    checkInputs([firstNameField,lastNameField,emailField,pass1Field,pass2Field,phoneField,addressField,favBreedField, descriptionField, picture]);
});
