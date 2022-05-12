<?php

include_once '../class/dbconn.class.php' ;
include_once '../class/setNewPassword.class.php';
include_once '../class/setNewPasswordControler.class.php';

//get data sent from ajax
$newPass1 = $_POST['password1'];
$newPass2 = $_POST['password2'];
$email = $_POST['email'];

//class that sets new password
$setPass = new SetNewPasswordControler($newPass1,$newPass2, $email);
$setPass->setPassword();