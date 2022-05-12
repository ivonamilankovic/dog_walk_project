'use strict';

const errorDog = document.getElementById('errorDog');

const dogName = document.getElementById('dogName');
const dogGender = document.getElementById('dogGender');
const dogAge = document.getElementById('dogAge');
const dogBreed = document.getElementById('dogBreed');
const notes = document.getElementById('notes');

const createBtn = document.getElementById('createBtn');


//check functions
function chkName(input,errOutput){
    if (input.value === "") {
        showError(input, "Fill out all fields!",errOutput);
        return false;
    } else {
        showSuccess(input);
        return true;
    }
}

function chkNotes(input,errOutput){
    if(input.value === ""){
        showError(input, "Fill out all fields!",errOutput);
        return false;
    }else{
        showSuccess(input);
        return true;
    }
}

function checkAge(input,errOutput){
    if(input.value === ""){
        showError(input, "Fill out all fields!",errOutput);
        return false;
    }
    else if(isNaN(input.value)){
        showError(input, "You should type in a number!",errOutput);
        return false;
    }
    else if(input.value < 0 || input.value >=30){
        showError(input, "Age should be between 0 and 30.",errOutput);
        return false;
    }
    else{
        showSuccess(input);
        return true;
    }
}

function chkGender(input,errOutput){
    if(input.value === "choose"){
        showError(input, "Choose dog gender!",errOutput);
        return false;
    }
    else{
        showSuccess(input,errOutput);
        return true;
    }
}

function chkBreed(input,errOutput){
    if(input.value === "choose"){
        showError(input, "Choose dog breed!",errOutput);
        return false;
    }
    else{
        showSuccess(input);
        return true;
    }
}


//eventListener
createBtn.addEventListener('click',function(event){
    //event.preventDefault();
    let formIsOk = true;

    //button for signup
    errorDog.innerText = null;
    let x = chkName(dogName,errorDog);
    if(!x){
        formIsOk = false;
    }

    let y = checkAge(dogAge,errorDog);
    if(!y){
        formIsOk = false;
    }

    let z = chkNotes(notes,errorDog);
    if(!z){
        formIsOk = false;
    }

    let j = chkGender(dogGender,errorDog);
    if(!j){
        formIsOk = false;
    }

    let i = chkBreed(dogBreed,errorDog);
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
