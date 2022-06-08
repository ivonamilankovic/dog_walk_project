<?php

include_once '../class/dbconn.class.php';
include_once '../class/verify.class.php';
include_once '../class/verifyControler.class.php';

//get code
$code = $_GET['code'];
$col = $_GET['col'];
$column = "";

if($col === "fp"){
    $column="forgot_password_code";
}else if($col === "ver"){
    $column="verification_code";
}

//class that checks if code match
$verify = new VerifyControler($code, $column);
$result = $verify->checkCode();

if($result === true){
    if($column === "verification_code"){
        header("location: ./home.php?act=success");
    }
    else if($column === "forgot_password_code"){
        header("location: ./changePassword.php?fp=y");
    }
}
else{
    header("location: ./home.php?act=expired");
}

