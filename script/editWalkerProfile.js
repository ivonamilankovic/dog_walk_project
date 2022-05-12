'use strict';

const emailWalker = document.getElementById('emailWalker');
const fNameWalker = document.getElementById('firstNameW');
const lNameWalker = document.getElementById('lastNameW');
const phoneWalker = document.getElementById('phoneW');
const favBreed = document.getElementById('favBreedSelect');
const biography = document.getElementById('biography');
const imageWalker = document.getElementById('myFileW');
const streetWalker = document.getElementById('streetW');
const cityWalker = document.getElementById('cityW');
const zipWalker = document.getElementById('zipW');
const errorWalker = document.getElementById('errUpdateWalker');
const updateWalkerBtn = document.getElementById('updateWalker');

//functions
function updateWalker(){
    $.ajax({
       url: "../include/updateWalkerInfo.inc.php",
       method: "POST",
       dataType: "JSON",
       data: {
           "firstName": fNameWalker.value,
           "lastName": lNameWalker.value,
           "phone": phoneWalker.value,
           "favBreed": favBreed.value,
           "bio": biography.value,
           "image": imageWalker.value,
           "street": streetWalker.value,
           "city": cityWalker.value,
           "zip": zipWalker.value,
           "email":emailWalker.innerText
       },
       success: (response)=>{
           console.log(response);
            if(response.updated === "done"){
                window.location.reload();
            }else if(response.updated === "failedToGetId" || response.error === "stmtIfExistInTableFailed" || response.error === "stmtUpdateUserInfoFailed" || response.error === "stmtUpdateAddressFailed" || response.error === "stmtUpdateWalkerDetailsFailed" || response.error === "stmtInsertWalkerDetailsFailed" || response.error === "stmtUpdateFavBreedFailed" || response.error === "stmtInsertFavBreedFailed"){
                errorWalker.innerText = "Failed to change your data. Please try again!";
            }
       } ,
        error: (msg) => {
           console.log(msg);
        }
    });
}

//event listener
updateWalkerBtn.addEventListener('click', (e)=>{
    errorWalker.innerText = "";
    checkInputsArray([fNameWalker,lNameWalker,phoneWalker,streetWalker,cityWalker,zipWalker],errorWalker);
    checkImage(imageWalker,errorWalker); //TO DO
    isEmpty(biography,errorWalker);
    checkSelectBreed(favBreed,errorWalker);
    if(errorWalker.innerText!==""){
        e.preventDefault();
    }else{
        updateWalker();
    }
});