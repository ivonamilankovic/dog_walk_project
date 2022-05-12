
function showSuccess(input){
    //shows green border on input
    input.classList.remove('is-invalid');
    input.classList.add('is-valid');
}
function showError(input, mess, errorInput){
    //shows red border on input and error message
    input.classList.remove('is-valid');
    input.classList.add('is-invalid');
    errorInput.innerText = mess.toString();
}

function checkInput(username, password, errOutput){
    //checks if fields are empty
    if (username.value === "" && password.value === ""){
        showError(username,"Every field is required!",errOutput);
        showError(password,"Every field is required!",errOutput);
        return;
    }

    if(username.value === ""){
        showError(username,"Username is required!",errOutput);
    }
    else{
        checkEmail(username,errOutput);
    }

    if(password.value === ""){
        showError(password, "Password is required!",errOutput);
    }
    else{
        checkPassLength(password,errOutput);
    }

    //if both are good show no error message
    if(username.classList.contains('success') && password.classList.contains('success')){
        errOutput.innerText = null;
    }
}

function checkInputsArray(inputArray, errOutput){
    //checks if fields are empty

    let flag = 0;
    inputArray.forEach(input => {
        switch (input.type) {
            case 'text':
                if (input.value === "") {
                    showError(input, `${input.placeholder} is required!`,errOutput);
                    flag++;
                } else {
                    showSuccess(input);
                }
                break;
            case 'email':
                if (input.value === "") {
                    showError(input, `${input.placeholder} is required!`,errOutput);
                    flag++;
                } else {
                    checkEmail(input,errOutput);
                }
                break;
            case 'password':
                if (input.value === "") {
                    showError(input, `${input.placeholder} is required!`,errOutput);
                    flag++;
                } else {
                    checkPassLength(input,errOutput);
                }
                break;
            case 'tel':
                if (input.value === "") {
                    showError(input, `${input.placeholder} is required!`,errOutput);
                    flag++;
                } else {
                    checkPhone(input,errOutput);
                }
                break;
            case 'number':
                if(input.value === ""){
                    showError(input, `${input.placeholder} is required!`,errOutput);
                    flag++;
                }else{
                    checkPostalCode(input,errOutput);
                }
                break;
            case 'textarea':
                if(input.value.trim() === ""){
                    showError(input,"Biography is required!",errOutput);
                } else{
                    showSuccess(input);
                }
                break;
        }

    });
    if(flag){
        errorMsg.innerText = "Fill out all fields!";
    }

}
function checkEmail(input,errOutput){
    //checks if email is in correct format
    const re = /^[a-z][a-zA-Z0-9_.]*(\.[a-zA-Z][a-zA-Z0-9_.]*)?@[a-z][a-zA-Z-0-9]*\.[a-z]+(\.[a-z]+)?$/;
    if(re.test(input.value.trim())){
        showSuccess(input);
    }
    else{
        showError(input, 'Email is not valid.',errOutput);
    }
}
function checkPassLength(input,errOutput){
    //checks length of password
    if(input.value.length < 6 || input.value.length > 15){
        showError(input, "Password must be between 6 and 15 characters!",errOutput);
    }
    else{
        showSuccess(input);
    }
}
function checkPassMatch(pass1,pass2,errOutput){
    //check if passwords match
    if(pass1.value !== "" && pass2.value !== "" && pass1.value === pass2.value){
        showSuccess(pass1);
        showSuccess(pass2);
        checkPassLength(pass1);
        checkPassLength(pass2);
    }
    else{
        showError(pass2,"Passwords do not match!",errOutput);
    }
}
function checkPhone(input, errOutput){
    //checks length of phone number
    if(input.value.length !== 10){
        showError(input, "Phone number must have 10 digits!",errOutput);
    }
    else if(isNaN(input.value)){
        showError(input, "Phone number must have digits, not letters!",errOutput);
    }
    else {
        showSuccess(input);
    }
}
function checkPostalCode(input,errOutput){
    //checks length of postal code
    if(input.value.length < 5 || input.value.length > 10){
        showError(input, "Postal code must have 5 to 10 digits!",errOutput);
    }
    else{
        showSuccess(input);
    }
}
function isEmpty(input,errOutput){
    //check only one input
    if(input.value === ""){
        showError(input,"Fill out fields!",errOutput);
    }else{
        showSuccess(input);
    }
}

function checkSelectBreed(input, errOutput){
    if(input.selected === "choose"){
        showError(input,"You have to select breed.",errOutput);
    }else{
        showSuccess(input);
    }
}



function checkImage(input,errOutput){}





