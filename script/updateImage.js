function updateImage(fileField,id,errField){

    $.ajax({
        url: "../include/changeProfilePic.inc.php",
        method: "POST",
        data: {
            "filename" : fileField.value,
            "id" : id.value
        },
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        success: (response)=>{
            console.log(response);
            if(response.error === "wrongImgFormat"){
                errField.innerText = "Wrong picture format.";
            }
            else if(response.error === "fileError"){
                errField.innerText = "Unexpected file error.";
            }
            else if(response.error === "bigImg"){
                errField.innerText = "Image too big.";
            }
            else if(response.error === "couldNotMoveImg"){
                errField.innerText = "Some issues occurred.";
            }
            else if(response.error === "failedStmt"){
                errField.innerText = "Failed to update. Please try again.";
            }
        } ,
        error: (msg) => {
            console.log(msg);
        }
    });
}

