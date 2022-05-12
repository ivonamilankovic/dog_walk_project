<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Paw Walks - Walker</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/signup.css">
    <link rel="stylesheet" href="../css/homeStyle.css">
    <link rel="stylesheet" href="../css/scrollbar.css">
</head>

<body>

<?php

include_once '../page_parts/header.php';
include_once '../include/dbconfig.inc.php';


if(isset($_GET['walker'])){

    $sqlWalker = "SELECT  u.first_name, u.last_name, u.picture, wd.biography, a.city, a.postal_code, b.breed_name FROM user u
                INNER JOIN walker_details wd ON wd.walker_id = u.id
                INNER JOIN address a ON a.id = u.address_id
                INNER JOIN walker_favourite_breeds wb ON wb.walker_id = u.id
                INNER JOIN breeds b ON b.id = wb.breed_id
                WHERE  u.id = ".$_GET['walker'];
}
try{
    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
    $stmtWalker=$conn->prepare($sqlWalker);
    $stmtWalker->execute();
    $walker= $stmtWalker->fetch(PDO::FETCH_ASSOC);
}
catch (Exception $ex){
    echo($ex -> getMessage());
}
?>


<div class="container ">
    <div class="row border rounded karta mx-auto" style="max-width: 1000px;">
        <div class="card mb-3" style="max-width: 1000px;">
            <div class="row g-0">
                <div class="col-md-4 align-self-center p-2">
                    <img src="https://picsum.photos/150/150" class="img-fluid rounded-circle" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $walker['first_name']." ".$walker['last_name'];?></h2>
                        <div class="card-text">
                            <h5><?php echo $walker['postal_code']. " ". $walker['city'];?></h5>
                            <br>
                            <div class="border-bottom border-end">
                                <p>About me: </p>
                                <p style="text-indent: 30px;"><?php echo $walker['biography'];?></p>
                                <p>My favourite breed: </p>
                                <p style="text-indent: 30px;"><?php echo $walker['breed_name'];?></p>
                            </div>
                            <br>
                            <button id="openReservation" class="ms-5 my-3" style="background-color: #9c7a97;border: 1px solid black; border-radius: 5px; display: block;">Click here to reserve walk with me!</button>
                            <div id="reservationDiv" style="display: none;">
                                <!--Part for reservation-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="../script/signup.js"></script>
<script src="../script/login.js"></script>
<script src="../script/home.js"></script>
<script src="../script/checkFunctions.js"></script>
<script src="../script/reservation.js"></script>
</body>
</html>
