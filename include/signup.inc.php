<?php

//get data that are sent from ajax

    $role = $_POST['role'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $pass2= $_POST['pass2'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $postalCode = $_POST['postalCode'];

//print_r($role." ". $firstName." ".$lastName." ".$email." ".$pass1." ".$pass2." ".$phone." ".$address." ".$city." ".$postalCode);
print_r("inc");

include_once '../class/dbconn.class.php';
include_once '../class/signup.class.php';
include_once '../class/signupControler.class.php';

//create class that will be used for creating user
$signup = new SignupControler($role,$firstName,$lastName,$email,$pass1,$pass2,$phone,$address,$city,$postalCode);
$signup->signupUser();
header("location: ../home.php?error=none");

?>