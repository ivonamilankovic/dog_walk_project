<?php

include_once '../class/dbconn.class.php' ;
include_once '../class/getVerification.class.php' ;
include_once '../class/getVerificationControler.class.php' ;

//get data sent from ajax
$email = $_POST['email'];

$column = "forgot_password_code";

//class that send new verification code
$verify = new GetVerificationControler($email,$column);
$verify->getCode();

