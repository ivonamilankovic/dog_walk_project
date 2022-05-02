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

function checkInputs2(inputArray){
    //checks if fields are empty
    let flag = 0;
    inputArray.forEach(input => {
        switch (input.type) {
            case 'text':
                if (input.value === "") {
                    showError2(input, `${input.placeholder} is required!`);
                    flag++;
                } else {
                    showSuccess2(input);
                }
                break;
            case 'age':
                if(input.value === ""){
                    showError2(input, `${input.placeholder} is required!`);
                    flag++;
                }else{
                    checkAge(input);
                }
                break;
        }
    });
    if(flag){
        errorDog.innerText = "Fill out all fields!";
    }
}
function chkNotes(input){
    if(input.value === ""){
        showError2(input, `Fill out all fields!`);
    }else{
        showSuccess2(input);
    }
}

function checkAge(input){
    if(input.value.length > 2){
        showError2(input, "Age should be between 0 and 30.");
    }
    else if(input.value < 0 || input.value >=30){
        showError2(input, "Age should be between 0 and 30.");
    }
    else{
        showSuccess2(input);
    }
}

//eventListener
createBtn.addEventListener('click',function(event){
    event.preventDefault();
    //button for signup
    errorDog.innerText = null;
    checkInputs2([dogName,dogGender,dogAge,dogBreed,notes]);
    chkNotes(notes);
});
