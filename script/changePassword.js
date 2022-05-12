'use strict';

const password1 = document.getElementById('newPassword1');
const password2 = document.getElementById('newPassword2');
const email = document.getElementById('emailP');
const changeBtn = document.getElementById('changePasswordBtn');
const newErrorMessage = document.getElementById('newErrorMessage');
//functions
function changePassword(){
    //changes password
    $.ajax({
        url: '../include/changePassword.inc.php',
        method: 'POST',
        dataType: "JSON",
        data:{
            "password1": password1.value,
            "password2": password2.value,
            "email": email.value
        },
        success: (response) => {
            console.log(response);
            if(response.newPassword === "set"){
                $("#newErrorMessage").innerText = null;
                alert("You have succesfully changed your password!");
            }else if(response.error === "stmtSetNewPasswordFailed"){
                errorNewPass.innerText = "Failed to set new password. Try again.";
            }
        },
        error: (msg) => {
            console.log(msg);
        }
    });
}

//event listener
changeBtn.addEventListener('click', ()=> {
    isEmpty(password1,newErrorMessage);
    isEmpty(password2, newErrorMessage);
    isEmpty(email,newErrorMessage);
   checkPassLength(password1,newErrorMessage);
   checkPassLength(password2,newErrorMessage);
   checkPassMatch(password1, password2,newErrorMessage);
   checkEmail(email,newErrorMessage);
   changePassword();
});

password2.addEventListener("keyup", (event) => {
    //if enter is pressed it will automatically trigger button for login
    if (event.keyCode === 13) {
        event.preventDefault();
        loginBtn.click();
    }
});