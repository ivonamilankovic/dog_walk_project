<?php

include_once '../class/dbconn.class.php';
include_once '../class/updateCustomer.class.php';
include_once '../class/updateCustomerController.class.php';

//get data from ajax
$fname = $_POST['firstName'];
$lname = $_POST['lastName'];
$phone = $_POST['phone'];
$image = $_POST['image'];
$street = $_POST['street'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$email = $_POST['email'];

//updates users data
$update = new UpdateCustomerController($fname,$lname,$phone,$image,$street,$city,$zip,$email);
$update->update();
