<?php

include_once '../class/dbconn.class.php' ;
include_once '../class/setNewPassword.class.php';
include_once '../class/setNewPasswordControler.class.php';

//get data sent from ajax
$newPass1 = $_POST['newPass1'];
$newPass2 = $_POST['newPass2'];
$fpCode = $_POST['fpCode'];

$column = "forgot_password_code";

//class that sets new password
$setPass = new SetNewPasswordControler($newPass1,$newPass2, $fpCode, $column);
$setPass->setPassword();