'use strict';

const password1 = document.getElementById('newPassword1');
const password2 = document.getElementById('newPassword2');
const email = document.getElementById('emailP');
const changeBtn = document.getElementById('changePasswordBtn');
const newErrorMessage = document.getElementById('newErrorMessage');
const changemsgDiv = document.getElementById('changemsg');
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
                changemsgDiv.innerHTML ="You have successfully changed your password! <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>";
                changemsgDiv.classList.add('alert');
                changemsgDiv.classList.add('alert-success');

            }else if(response.error === "stmtSetNewPasswordFailed"){
                errorNewPass.innerText = "Failed to set new password. Try again.";
                errorNewPass.classList.add('alert');
                errorNewPass.classList.add('alert-danger');
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