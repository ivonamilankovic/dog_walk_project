'use strict';

const errorDog = document.getElementById('errorDog');

const dogName = document.getElementById('dogName');
const dogGender = document.getElementById('dogGender');
const dogAge = document.getElementById('dogAge');
const dogBreed = document.getElementById('dogBreed');
const notes = document.getElementById('notes');

const createBtn = document.getElementById('createBtn');

//functions
function showSuccess2(input){
    //shows green border on input
    input.classList.remove('is-invalid');
    input.classList.add('is-valid');
}
function showError2(input, mess){
    //shows red border on input and error message
    input.classList.remove('is-valid');
    input.classList.add('is-invalid');
    errorDog.innerText = mess.toString();
}