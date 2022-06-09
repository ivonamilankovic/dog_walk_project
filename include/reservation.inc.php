<?php
session_start();
    $dateOfWalk = $_POST['dateOfWalk'];
    $dateEnd = $_POST['dateEnd'];
    $startLoc = $_POST['startLoc'];
    $endLoc = $_POST['endLoc'];
    $details = $_POST['details'];
    $status = "pending";
    $customer_id = $_POST['customer_id'];
    $walker_id = $_POST['walker_id'];
    $dogs_id = $_POST['dogs']; //array

include "../class/dbconn.class.php";
include "../class/reservation.class.php";
include "../class/reservationController.class.php";

$reserve = new ReservationController($dateOfWalk, $dateEnd, $startLoc, $endLoc, $details, $status, $customer_id, $walker_id, $dogs_id);
$reserve->reserveWalk();
