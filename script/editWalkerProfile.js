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
const activeW = document.getElementById('is_active');
const errorWalker = document.getElementById('errUpdateWalker');
const updateWalkerBtn = document.getElementById('updateWalker');
const updatemsgDiv = document.getElementById('updatemsg');

//functions
function updateWalker(){
    $.ajax({
        beforeSend: ()=>{
            $('.loader').show();
        },
       url: "../include/updateWalkerInfo.inc.php",
       method: "POST",
       dataType: "JSON",
       data: {
           "firstName": fNameWalker.value,
           "lastName": lNameWalker.value,
           "phone": phoneWalker.value,
           "favBreed": favBreed.value,
           "bio": biography.value,
           "street": streetWalker.value,
           "city": cityWalker.value,
           "zip": zipWalker.value,
           "email":emailWalker.innerText,
           "is_active": activeW.value
       },
       success: (response)=>{
           console.log(response);
            if(response.updated === "done"){
                $('.loader').hide();
                updatemsgDiv.innerHTML ="You have successfully updated your data! <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>";
                updatemsgDiv.classList.add('alert');
                updatemsgDiv.classList.add('alert-success');
                updatemsgDiv.classList.add('alert-dismissible');
                removeSuccess([fNameWalker,lNameWalker,phoneWalker,favBreed,biography, streetWalker,cityWalker,zipWalker]);
                window.scrollTo(0,0);
            }else if(response.updated === "failedToGetId" || response.error === "stmtIfExistInTableFailed" || response.error === "stmtUpdateUserInfoFailed" || response.error === "stmtUpdateAddressFailed" || response.error === "stmtUpdateWalkerDetailsFailed" || response.error === "stmtInsertWalkerDetailsFailed" || response.error === "stmtUpdateFavBreedFailed" || response.error === "stmtInsertFavBreedFailed"){
                errorWalker.innerText = "Failed to change your data. Please try again!";
                errorWalker.classList.add('alert');
                errorWalker.classList.add('alert-danger');
                errorWalker.classList.add('alert-dismissible');

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
    if(activeW.value != 0){
        isEmpty(biography,errorWalker);
        checkSelectBreed(favBreed,errorWalker);
    }
    checkInputsArray([fNameWalker,lNameWalker,phoneWalker,streetWalker,cityWalker,zipWalker],errorWalker);

     if(errorWalker.innerText!==""){
        e.preventDefault();
    }else{
        updateWalker();
    }
});

document.getElementById('idW').addEventListener('click', (e)=>{
    //e.preventDefault();
    if(!validateImage('myFileW')){
        errorWalker.innerText = "Image must be jpg, jpeg or png type.";
        e.preventDefault();
    }
    //updateImage('myFileW','idW', errorWalker);
    //POPRAVITI AKO JE MOGUCE

})