<?php

include_once '../class/dbconn.class.php';
include_once '../class/updateWalker.class.php';
include_once '../class/updateWalkerController.class.php';

//get data from ajax
$fname = $_POST['firstName'];
$lname = $_POST['lastName'];
$phone = $_POST['phone'];
$favBreed = $_POST['favBreed'];
$bio = $_POST['bio'];
$street = $_POST['street'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$email = $_POST['email'];
$active = $_POST['is_active'];

//do update
$update = new UpdateWalkerController($fname,$lname,$phone,$favBreed,$bio,$street,$city,$zip,$email, $active);
$update->update();