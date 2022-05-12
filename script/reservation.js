'use strict';

const openResBtn = document.getElementById('openReservation');
const reservationFormDiv = document.getElementById('reservationDiv');

openResBtn.addEventListener('click', ()=>{
    if(reservationFormDiv.style.display === "none"){
        reservationFormDiv.style.display = "block";
        openResBtn.innerText ="Close form.";
    }
    else if(reservationFormDiv.style.display === "block"){
        reservationFormDiv.style.display = "none";
        openResBtn.innerText = "Click here to reserve walk with me!";
    }
});