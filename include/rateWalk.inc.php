<?php
if(isset($_POST["rateBtn"])){
    //grabbing the data
    $rate = $_POST['rate'];
    $id_walk = $_POST['id_walk'];

}
else{
    header("location: ../customer_dashboard/rateWalk.php");
    exit();
}

include "../class/dbconn.class.php";
include "../class/rateWalk.class.php";
include "../class/rateWalkController.class.php";

$rating = new RateWalkController($rate, $id_walk);
$rating->rate();


header("location: ../pages/home.php?rate=y");
die();