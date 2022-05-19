<?php
if(isset($_POST["deleteDog"])){
    //grabbing the data
    $dog_id = $_POST['dog_id'];
}
else{
    header("location: ../customer_dashboard/dogAccount.php");
    exit();
}

include "../class/dbconn.class.php";
include "../class/deleteDog.class.php";
include "../class/deleteDogController.php";

$delete = new deleteDogController($dog_id);

$delete->delDog();

header("location: ../customer_dashboard/dogAccount.php");
die();