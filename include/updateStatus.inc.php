<?php
if(isset($_POST["saveStatus"])){

    //grabbing the data
    $status = $_POST["status"];
    $id_walk = $_POST["idWalk"];
}
else{
    header("location: ../walker_dashboard/listOfWalks.php");
    exit();
}

include "../class/dbconn.class.php";
include "../class/updateStatus.class.php";
include "../class/updateStatusController.class.php";

$update = new UpdateStatusController($status, $id_walk);

$update->updateStatus();

header("location: ../walker_dashboard/listOfWalks.php");
die();