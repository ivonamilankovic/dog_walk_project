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

    $sqlWalker = "SELECT u.id,  u.first_name, u.last_name, u.picture, wd.biography, a.city, a.postal_code, b.breed_name FROM user u
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
                            <button id="openReservation" class="ms-5 my-3" style="padding: 12px; background-color: #9c7a97;border: 1px solid black; border-radius: 5px; display: block;">Click here to reserve walk with me!</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-0 mt-4" id="reservationDiv" style="display: none;">
                <div class="col-10 mx-auto">
                    <!--Part for reservation-->
                    <form action="../include/reservation.inc.php" method="post" id="reservationForm">
                        <div class="form-floating">
                            <?php
                            $epoch = strtotime("+2 week");
                            $dt = new DateTime("@$epoch");
                            $timestamp = $dt->format('Y-m-d H:i:s');
                            $endlimit = str_replace(' ', 'T', date_format(date_create($timestamp), 'Y-m-d H:i'));
                            ?>
                            <input  class="form-control" id="dateOfWalk" name="dateOfWalk" type="datetime-local" placeholder="Date of walk" min="<?=str_replace(' ', 'T', date_format(date_create(date("Y-m-d H:i:s")), 'Y-m-d H:i'));?>" max="<?=$endlimit?>">
                            <label for="dateOfWalk">Date of Walk</label>
                        </div>
                        <br>
                        <select class="form-select" style="height: 72px;" name="duration" id="duration">
                            <option disabled selected value="choose">hh:mm</option>
                            <option value="00:15">00:15</option>
                            <option value="00:30">00:30</option>
                            <option value="00:45">00:45</option>
                            <option value="01:00">01:00</option>
                            <option value="01:15">01:15</option>
                            <option value="01:30">01:30</option>
                            <option value="01:45">01:45</option>
                            <option value="02:00">02:00</option>
                        </select>
                        <br>
                        <div class="form-floating">
                            <input  class="form-control" id="startLoc" name="startLoc" type="text" placeholder="Start Location">
                            <label for="startLoc">Start Location</label>
                        </div>
                        <br>
                        <div class="form-floating">
                            <input  class="form-control" id="endLoc" name="endLoc" type="text" placeholder="End Location">
                            <label for="endLoc">End Location</label>
                        </div>

                        <br>
                        <div>
                            <div>Select dog for a walk:</div>
                            <!--customer dogs-->
                            <?php
                            require_once ("../include/dbconfig.inc.php");

                            $sqlDog = "SELECT d.id, d.dog_name FROM dog d
                                        WHERE d.owner_id = ".$_SESSION['id'];

                            try{
                                $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
                                $stmtDog=$conn->prepare($sqlDog);
                                $stmtDog->execute();
                                $dogData = $stmtDog->fetchAll(PDO::FETCH_ASSOC);

                                $rows = array();
                                while( $stmtDog->fetch(PDO::FETCH_ASSOC))
                                    $rows[] = $stmtDog;
                            }
                            catch (Exception $ex){
                                echo($ex -> getMessage());
                            }
                            if(!empty($dogData)){
                                foreach ($dogData as $dog){
                                    ?>
                                    <input type="checkbox" value="<?php echo $dog['id']; ?>" name="dogs[]" id="dog">
                                    <label for="dog"><?php echo $dog['dog_name']; ?></label> <br>
                                    <?php
                                }
                            }
                            else{
                                ?>
                                <a href="../customer_dashboard/createDog.php" style="color: #f00;">First you have to insert your dog to your profile!</a><br>
                                <?php
                            }


                                ?>
                        </div>

                        <br>
                        <div class="form-floating">
                            <textarea class="form-control" name="details" id="details" style="height: 160px;" placeholder="Enter some extra info if you want..."></textarea>
                            <label for="details">Enter some extra info if you want...</label>
                        </div>
                        <input type="hidden" value="<?php echo $_GET['walker']?>" name="walker_id" id="walker_id">
                        <br>
                        <small id="errorReservation" style="color: #ff0000"></small>
                        <button id="submitReservation" name="submitReservation" class="mx-auto my-3" style="padding: 12px; background-color: #9c7a97;border: 1px solid black; border-radius: 5px; display: block;">Submit my reservation</button>
                    </div>
                </form>
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
