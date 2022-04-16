<?php

include_once '../class/dbconn.class.php' ;
include_once '../class/getVerification.class.php' ;
include_once '../class/getVerificationControler.class.php' ;

//get data sent from ajax
$email = $_POST['email'];

//class that send new verification code
$verify = new GetVerificationControler($email);
$verify->getCode();
