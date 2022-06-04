'use strict';

const emailCust = document.getElementById('emailCust');
const fNameCust = document.getElementById('firstNameCust');
const lNameCust = document.getElementById('lastNameCust');
const phoneCust = document.getElementById('phoneCust');
const imageCust = document.getElementById('myFileCust');
const streetCust = document.getElementById('streetCust');
const cityCust = document.getElementById('cityCust');
const zipCust = document.getElementById('zipCust');
const errorCust = document.getElementById('errorUpdateCust');
const updateCustBtn = document.getElementById('updateCustomer');
const update2div = document.getElementById('update2div');

//functions
function updateCust(){
    $.ajax({
        url: "../include/updateCustomerInfo.inc.php",
        method: "POST",
        dataType: "JSON",
        data: {
            "firstName": fNameCust.value,
            "lastName": lNameCust.value,
            "phone": phoneCust.value,
            "street": streetCust.value,
            "city": cityCust.value,
            "zip": zipCust.value,
            "email":emailCust.innerText
        },
        success: (response)=>{
            console.log(response);
            if(response.updated === "done"){
                update2div.innerHTML ="You have successfully updated your data! <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>";
                update2div.classList.add('alert');
                update2div.classList.add('alert-success');

            }else if(response.updated === "failedToGetId"  || response.error === "stmtUpdateUserInfoFailed" || response.error === "stmtUpdateAddressFailed"){
                errorCust.innerHTML = "Failed to change your data. Please try again! ";
                errorCust.classList.add('alert');
                errorCust.classList.add('alert-danger');
            }
        } ,
        error: (msg) => {
            console.log(msg);
        }
    });
}

//event listener
updateCustBtn.addEventListener('click', (e)=>{
    errorCust.innerText = "";
    checkInputsArray([fNameCust,lNameCust,phoneCust,streetCust,cityCust,zipCust],errorCust);
    if(errorCust.innerText!==""){
        e.preventDefault();
    }else{
        updateCust();
    }
});

document.getElementById('idC').addEventListener('click', (e)=>{
    //e.preventDefault();
    if(!validateImage('myFileC')){
        errorWalker.innerText = "Image must be jpg, jpeg or png type.";
        e.preventDefault();
    }
    window.scrollTo(0,0);
    //updateImage('myFileW','idW', errorWalker);
    //POPRAVITI AKO JE MOGUCE

})