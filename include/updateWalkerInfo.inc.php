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
$image = $_POST['image'];
$street = $_POST['street'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$email = $_POST['email'];

//do update
$update = new UpdateWalkerController($fname,$lname,$phone,$image,$favBreed,$bio,$street,$city,$zip,$email);
$update->update();