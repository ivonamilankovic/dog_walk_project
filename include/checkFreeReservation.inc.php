<?php

include_once '../class/dbconn.class.php';
include_once '../class/checkFreeReservation.class.php';
include_once '../class/checkFreeReservationController.class.php';

$dateFrom = $_POST['dateStart'];
$dateTo = $_POST['dateEnd'];
$walker_id = $_POST['walker_id'];

$check = new CheckFreeReservationController($dateFrom, $dateTo, $walker_id);
$check->checkRes();

