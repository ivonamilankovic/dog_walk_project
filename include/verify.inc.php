<?php

include_once '../class/dbconn.class.php';
include_once '../class/verify.class.php';
include_once '../class/verifyControler.class.php';

//get code from ajax
$code = $_POST['code'];

/*
$arr = array("code" => $code);
echo json_encode($arr);*/

//class that checks if code match
$verify = new VerifyControler($code);
$verify->checkCode();

