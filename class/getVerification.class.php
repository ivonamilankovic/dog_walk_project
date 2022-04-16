<?php

class GetVerification extends Dbconn {

    //function that generates and send verification code to users email address
    public function sendVerificationCode($email){
        $code = rand(100000,999999);

        $sql5 = "UPDATE user SET verification_code = ? WHERE email = ?";
        $stmtCode = $this->setConnection()->prepare($sql5);

        if(!$stmtCode->execute([$code,$email])){
            $stmtCode = null;
            $array = array("error" => "stmtSendVerificationFailed");
            echo json_encode($array);
            die();
        }else {
            $to = $email;
            $subject = "Welcome to Paw Walks! Here is your verification code.";
            $txt = "Your verification code is: " . $code . "\nEnter your code here: url";
            mail($to, $subject, $txt, 'From: ivonamilankovic@yahoo.com');

        }
    }
}