'use strict';

const openResBtn = document.getElementById('openReservation');
const reservationFormDiv = document.getElementById('reservationDiv');

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