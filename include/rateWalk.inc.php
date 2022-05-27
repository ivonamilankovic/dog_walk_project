<?php
if(isset($_POST["rate"])){
    //grabbing the data
    $path = $_POST["path"];
    $id_walk = $_POST['reservation_id'];

}
else{
    header("location: ../walker_dashboard/finishWalk.php");
    exit();
}

include "../class/dbconn.class.php";
include "../class/rateWalk.class.php";
include "../class/rateWalkController.class.php";

$rate = new RateWalkController($path, $id_walk);
$rate->rate();


header("location: ../pages/home.php");
die();