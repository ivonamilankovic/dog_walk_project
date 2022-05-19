<?php
session_start();
if(isset($_POST["submitReservation"])){
    $dateOfWalk = $_POST['dateOfWalk'];
    $duration = $_POST['duration'];
    $startLoc = $_POST['startLoc'];
    $endLoc = $_POST['endLoc'];
    $details = $_POST['details'];
    $status = 0;
    $code = 0; //rand ???
    $rate = null;
    $customer_id = $_SESSION['id'];
    $walker_id = $_POST['walker_id'];
    $dogs_id = $_POST['dogs']; //array
}
else{
    header("location: ../pages/oneWalker.php");
    exit();
}

include "../class/dbconn.class.php";
include "../class/reservation.class.php";
include "../class/reservationController.class.php";

$reserv = new ReservationController($dateOfWalk, $duration, $startLoc, $endLoc, $details, $status, $code, $rate, $customer_id, $walker_id, $dogs_id);
$reserv->reserveWalk();

header("location: ../pages/oneWalker.php");
die();
