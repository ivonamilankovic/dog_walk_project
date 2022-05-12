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
            "image": imageCust.value,
            "street": streetCust.value,
            "city": cityCust.value,
            "zip": zipCust.value,
            "email":emailCust.innerText
        },
        success: (response)=>{
            console.log(response);
            if(response.updated === "done"){
                window.location.reload();
            }else if(response.updated === "failedToGetId"  || response.error === "stmtUpdateUserInfoFailed" || response.error === "stmtUpdateAddressFailed"){
                errorCust.innerText = "Failed to change your data. Please try again!";
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
    checkImage(imageCust,errorCust); //TO DO
    if(errorCust.innerText!==""){
        e.preventDefault();
    }else{
        updateCust();
    }
});