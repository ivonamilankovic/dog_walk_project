<?php

class GetVerification extends Dbconn {

    //function that generates and send verification code to users email address
    public function sendVerificationCode($email, $columnName){
        $code = rand(100000,999999);

        $sql5 = "UPDATE user SET ".$columnName." = ?, updated_at = ? WHERE email = ?";
        $stmtCode = $this->setConnection()->prepare($sql5);

        if(!$stmtCode->execute([$code,date('Y-m-d H:i:s'),$email])){
            $stmtCode = null;
            $array = array("error" => "stmtSendCodeFailed");
            echo json_encode($array);
            die();
        }else {
            $to = $email;
            $subject = "";
            $txt = "";
            if($columnName === "forgot_password_code"){
                $subject = "Paw walks sends you code to reset your password!";
                $txt = "Your code is: " . $code . ".\nTo reset your password, enter your code here: url ";
            }elseif ($columnName === "verification_code"){
                $subject = "Welcome to Paw Walks!";
                $txt = "Your code is: " . $code . "\nTo verify your email address, enter your code here: url";
            }
            //mail($to, $subject, $txt, 'From: sarababic01@yahoo.com');
            mail($to, $subject, $txt, 'From: ivonamilankovic@yahoo.com');

        }
    }
}