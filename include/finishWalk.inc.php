<?php
if(isset($_POST["finish"])){
    //grabbing the data
    $path = $_POST["path"];
    $id_walk = $_POST['reservation_id'];

}
else{
    header("location: ../walker_dashboard/finishWalk.php");
    exit();
}

include "../class/dbconn.class.php";
include "../class/finishWalk.class.php";
include "../class/finishWalkController.class.php";
//classes for code
include_once '../class/getRate.class.php' ;
include_once '../class/getRateController.php';

$finish = new FinishWalkController($path, $id_walk);
$finish->finish();


$column = "code";
//create class that sends verification code
$verify = new GetRateController($id_walk, $column);
$verify->getCode();


header("location: ../pages/home.php");
die();