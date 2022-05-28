'use strict';

const errorPath = document.getElementById('errorPath');

const path = document.getElementById('path');

const finishBtn = document.getElementById('finish');

//check functions
function  chkPath(input, errOutput){
    if(input.value === "") {
        showError(input, "Add some info about your walk!", errOutput);
        return false;
    } else {
        showSuccess(input);
        return true;
    }
}

finishBtn.addEventListener('click', function (event){
    let formIsOk = true;

    errorPath.innerText = null;

    let x = chkPath(path,errorPath);
    if(!x){
        formIsOk = false;
    }

    if(formIsOk){
        document.getElementById('finishWalkForm').submit();
    }
    else {
        event.preventDefault();
    }

});