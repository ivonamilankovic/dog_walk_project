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
$verify->checkCode();

if($column === "verification_code"){
?>
<script>
    alert("You have successfully signup up!");
</script>
<?php
    header("location: ./home.php");
}
else if($column === "forgot_password_code"){
    header("location: ./changePassword.php");
}

