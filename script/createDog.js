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

//check functions
function chkName(input){
    if (input.value === "") {
        showError2(input, "Fill out all fields!");
        return false;
    } else {
        showSuccess2(input);
        return true;
    }
}

function chkNotes(input){
    if(input.value === ""){
        showError2(input, "Fill out all fields!");
        return false;
    }else{
        showSuccess2(input);
        return true;
    }
}

function checkAge(input){
    if(input.value === ""){
        showError2(input, "Fill out all fields!");
        return false;
    }
    else if(isNaN(input.value)){
        showError2(input, "You should type in a number!");
        return false;
    }
    else if(input.value < 0 || input.value >=30){
        showError2(input, "Age should be between 0 and 30.");
        return false;
    }
    else{
        showSuccess2(input);
        return true;
    }
}

function chkGender(input){
    if(input.value === "choose"){
        showError2(input, "Choose dog gender!");
        return false;
    }
    else{
        showSuccess2(input);
        return true;
    }
}

function chkBreed(input){
    if(input.value === "choose"){
        showError2(input, "Choose dog breed!");
        return false;
    }
    else{
        showSuccess2(input);
        return true;
    }
}


//eventListener
createBtn.addEventListener('click',function(event){
    //event.preventDefault();
    let formIsOk = true;

    //button for signup
    errorDog.innerText = null;
    let x = chkName(dogName);
    if(!x){
        formIsOk = false;
    }

    let y = checkAge(dogAge);
    if(!y){
        formIsOk = false;
    }

    let z = chkNotes(notes);
    if(!z){
        formIsOk = false;
    }

    let j = chkGender(dogGender);
    if(!j){
        formIsOk = false;
    }

    let i = chkBreed(dogBreed);
    if(!i){
        formIsOk = false;
    }

    if(formIsOk){
        document.getElementById("createDogForm").submit();
    }
    else{
        event.preventDefault();
    }

});
