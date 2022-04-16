<?php
include_once '../class/dbconn.class.php';
include_once '../class/signup.class.php';
include_once '../class/signupControler.class.php';
include_once '../class/getVerification.class.php' ;
include_once '../class/getVerificationControler.class.php' ;

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

//create class that will be used for creating user
$signup = new SignupControler($role,$firstName,$lastName,$email,$pass1,$pass2,$phone,$address,$city,$postalCode);
$signup->signupUser();
//create class that sends verification code
$verify = new GetVerificationControler($email);
$verify->getCode();

?>