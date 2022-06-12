'use strict';

const errorReservation = document.getElementById('errorReservation');

const walker = document.getElementById('walker_id');
const customer = document.getElementById('customer_id');
const date1 = document.getElementById('dateOfWalk');
const date2 = document.getElementById('dateEnd');
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
            //showSuccess(input);
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

        let dateStart = date1.value.toString().replace('T', ' ');
        dateStart +=':00';
        let dateEnd = date2.value.toString().replace('T', ' ');
        dateEnd +=':00';

        $.ajax({
            url:'../include/checkFreeReservation.inc.php',
            method: 'POST',
            dataType: 'JSON',
            data: {
                'dateStart': dateStart,
                'dateEnd': dateEnd,
                'walker_id': walker.value,
            },
            success: (response)=>{
                //console.log(response);
                if(response.error === 'emptyDates'){
                    errorReservation.innerText = 'Date can\'t be empty.';
                    event.preventDefault();
                    return false;
                }
                else if(response.error === 'stmtCheckFailed'){
                    errorReservation.innerText = 'Failed to check if walker is free at wanted time. Please try again.';
                    event.preventDefault();
                    return false;
                }
                else if(response.error === 'dateTaken'){
                    errorReservation.innerText = 'Sorry, walker already have a walk at the same time! Please choose another time or try with another walker';
                    event.preventDefault();
                    return false;
                }
                else if (response.success === "ok"){
                    insertRes();
                }
            },
            error: (msg)=>{
                //console.log(msg);
                event.preventDefault();
                return false;
            }
        });

    }
    else{
        event.preventDefault();
        return false;
    }

    event.preventDefault();

});


function insertRes(){

    let dateStart = date1.value.toString().replace('T', ' ');
    dateStart +=':00';
    let dateEnd = date2.value.toString().replace('T', ' ');
    dateEnd +=':00';

    var dogs = new Array();
    $("input:checked").each(function() {
        dogs.push($(this).val());
    });

    $.ajax({
        url:'../include/reservation.inc.php',
        method: 'POST',
        dataType: 'JSON',
        data: {
            'dateOfWalk': dateStart,
            'dateEnd': dateEnd,
            'details': details.value,
            'startLoc': startLocation.value,
            'endLoc':endLocation.value,
            'walker_id': walker.value,
            'customer_id':customer.value,
            'dogs': dogs
        },
        success: (response)=>{
            //console.log(response);
            if(response.error === 'empty'){
                errorReservation.innerText = 'Fields can\'t be empty.';
            }
            else if(response.error === 'stmtCreateReservationFail' || response.error === "stmtCreateWalkFail" || response.error === "stmtGetWalkerEmailFailed"){
                errorReservation.innerText = 'Failed to process your request. Please try again.';
            }
            else if (response.success === "done"){
                const msg = document.getElementById('msgWalkSucc');
                msg.innerHTML = "Your request for walk is successfully send to walker. You will get email when the walk is accepted. <a href=\"../customer_dashboard/reservedWalks.php\">Here</a> you can see all your walks. \n" +
                    "<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>";
                msg.classList.add('alert');
                msg.classList.add('alert-success');
                msg.classList.add('alert-dismissible');
                removeSuccess([date1,date2,startLocation,endLocation,details]);
                date1.value = date2.value = startLocation.value = endLocation.value = details.value = null;
                window.scrollTo(0,0);
            }
        },
        error: (msg)=>{
            //console.log(msg);
        }
    });
}