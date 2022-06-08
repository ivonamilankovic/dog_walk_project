<?php
session_start();

if(!isset($_SESSION['id']) && !isset($_GET['fp'])){
    header("location: ../pages/home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Paw Walks - Change my password</title>
        <link rel="stylesheet" type="text/css" href="../css/homeStyle.css"/>
        <link rel="stylesheet" type="text/css" href="../css/scrollbar.css"/>
        <link rel="stylesheet" type="text/css" href="../css/login.css"/>
        <link rel="stylesheet" type="text/css" href="../css/signup.css"/>
        <style>
            @media only screen and (max-width: 480px){
                .form-floating{
                    width: 80%;
                }
            }
        </style>
    </head>

    <body>

    <?php

    include_once '../page_parts/header.php';
    include_once '../include/dbconfig.inc.php';

    $_SESSION['disableInput'] = "\"no\"";
    $userData=["email"=>""];
    try{
        if(!empty($_SESSION['id'])) {
            $_SESSION['disableInput'] = "\"yes\"";
            $sqlUser = "SELECT email FROM user WHERE id = " . $_SESSION['id'];
            $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
            $stmtUser = $conn->prepare($sqlUser);
            $stmtUser->execute();
            $userData = $stmtUser->fetch(PDO::FETCH_ASSOC);
        }
    }
    catch (Exception $ex){
        echo($ex -> getMessage());
    }
?>

    <div id="changemsg"></div>
    <div class="loader"><img src="../images/loading-img.gif" alt="loading..."></div>
    <div class="container mx-auto">
            <div class="row">
                <h3 class="text-center mt-5">Change your password</h3>
            </div>
            <div class="row mx-auto">
                <div class="col-sm-8 col-lg-6 text-center mt-5 m-auto">
                    <div class="form-floating mx-auto">
                        <input  class="form-control" id="emailP" name="email" type="email" placeholder="Email" value="<?php if (!empty($userData)) echo $userData['email'];?>">
                        <label for="emailP">Email</label>
                    </div>
                    <br>
                    <div class="form-floating mx-auto">
                        <input  class="form-control" id="newPassword1" name="newPass1" type="password" placeholder="New Password">
                        <label for="newPassword1">New Password</label>
                    </div>
                    <br>
                    <div class="form-floating mx-auto">
                        <input  class="form-control" id="newPassword2" name="newPass2" type="password" placeholder="Repeat Password">
                        <label for="newPassword2">Repeat Password</label>
                    </div>
                    <br>
                    <small id="newErrorMessage" style="color: #f00;"></small>
                    <br>
                    <button type="submit" name="submit" id="changePasswordBtn" class="btn btn-primary m-auto mt-4" style="background-color: #9c7a97; border: 1px solid #000000; font-weight: bold; color:#000000">Change</button>
                </div>
            </div>
        </div>

    <script>

        //let disableEmailInput = false;
        let x = <?php echo $_SESSION['disableInput']; ?> ;


        const emailInput = document.getElementById('emailP');
        if(x === "yes"){
            emailInput.setAttribute('readonly', true);
            emailInput.setAttribute('disabled', true);
        }
        else if (x === "no"){
            emailInput.removeAttribute('readonly');
            emailInput.removeAttribute('disabled');
        }

    </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="../script/changePassword.js"></script>
        <script src="../script/home.js"></script>
        <script src="../script/login.js"></script>
        <script src="../script/signup.js"></script>
    <script src="../script/checkFunctions.js"></script>

    </body>
</html>
