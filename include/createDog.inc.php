<?php
if(isset($_POST["createDog"])){
    //grabbing the data
    $dogName = $_POST["dogName"];
    $dogGender = $_POST["dogGender"];
    $dogAge =  $_POST["dogAge"];
    $breed_id = $_POST["breed_id"];
    $notes = $_POST["notes"];
    session_start();
    $owner_id = $_SESSION['id'];
}
else{
    header("location: ../customer_dashboard/createDog.php");
    exit();
}

include "../class/dbconn.class.php";
include "../class/createDog.class.php";
include "../class/createDogControler.class.php";

$create = new createDogControler($dogName, $dogGender, $dogAge, $breed_id, $notes, $owner_id);

$create->createDog();

header("location: ../customer_dashboard/createDog.php?error=none");
