<?php
if(isset($_POST["finish"])){
    //grabbing the data
    $path = $_POST["path"];
    $id_walk = $_GET['reservation_id'];
    var_dump($id_walk); die();

}
else{
    header("location: ../walker_dashboard/finishWalk.php");
    exit();
}

include "../class/dbconn.class.php";
include "../class/createDog.class.php";
include "../class/createDogControler.class.php";
//classes for code
include_once '../class/getVerification.class.php' ;
include_once '../class/getVerificationControler.class.php' ;

$finish = new FinishWalkController($path, $id_walk);
$finish->finishWalk();


$column = "code";
$status = "finished";
//create class that sends verification code
$verify = new GetVerificationControler($customer_email, $column, $status);
$verify->getCode();


header("location: ../walker_dashboard/finishWalk.php");
die();