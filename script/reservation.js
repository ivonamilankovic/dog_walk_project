'use strict';

const errorReservation = document.getElementById('errorReservation');

const duration = document.getElementById('duration');
const startLocation = document.getElementById('startLoc');
const endLocation = document.getElementById('endLoc');
const details = document.getElementById('details');
const dogs = document.getElementById('dog');

const reservationBtn = document.getElementById('submitReservation');

const openResBtn = document.getElementById('openReservation');
const reservationFormDiv = document.getElementById('reservationDiv');

var visitor= document.getElementById('visitor').value;
if(visitor === "walker"){
    openResBtn.disabled = true;
    openResBtn.style.backgroundColor = "#d8d8d8";
    openResBtn.style.cursor = "not-allowed";
}

openResBtn.addEventListener('click', ()=>{
    //open/closes form
    if(reservationFormDiv.style.display === "none"){
        reservationFormDiv.style.display = "block";
        openResBtn.innerText ="Close the form";
        //scroll down
        $('html,body').animate({
                scrollTop: $("#reservationDiv").offset().top},
            200);
    }
    else if(reservationFormDiv.style.display === "block"){
        reservationFormDiv.style.display = "none";
        openResBtn.innerText = "Click here to reserve walk with me!";
    }
});


function chkDuration(input, errOutput){
    if(input.value === "choose"){
        showError(input, "Choose duration of walk!",errOutput);
        return false;
    }
    else{
        showSuccess(input,errOutput);
        return true;
    }
}

function chkEmpty(input,errOutput){
    if(input.value === ""){
        showError(input, "Fill out all fields!",errOutput);
        return false;
    }else{
        showSuccess(input);
        return true;
    }
}

function chkBox(input,errOutput){
        let f = new FormData(document.getElementById("reservationForm"));
        if(f.getAll("dogs[]").length > 0){
            showSuccess(input);
            return true;

        }else{
            showError(input, "Choose dog!",errOutput);
            return false;
        }

}
//eventListener
reservationBtn.addEventListener('click',function(event){
    //event.preventDefault();
    let formIsOk = true;

    //button for signup
    errorReservation.innerText = null;

    let dur = chkDuration(duration,errorReservation);
    if(!dur){
        formIsOk = false;
    }

    let start = chkEmpty(startLocation,errorReservation);
    if(!start){
        formIsOk = false;
    }

    let end = chkEmpty(endLocation,errorReservation);
    if(!end){
        formIsOk = false;
    }

    let notes = chkEmpty(details,errorReservation);
    if(!notes){
        formIsOk = false;
    }

    let dog = chkBox(dogs,errorReservation);
    if(!dog){
        formIsOk = false;
    }


    if(formIsOk){
        document.getElementById("reservationForm").submit();
    }
    else{
        event.preventDefault();
    }

});