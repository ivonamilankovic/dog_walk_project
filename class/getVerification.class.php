<?php

class GetVerification extends Dbconn
{

    //function that generates and send verification code to users email address
    protected function sendVerificationCode($email, $columnName, $type)
    {

        if ($type === "old") {

            $sql11 = "SELECT * FROM user WHERE email = ?";
            $stmt11 = $this->setConnection()->prepare($sql11);
            if (!$stmt11->execute([$email])) {
                $stmt11 = null;
                $array = array("error" => "stmtFindUserEmailFailed");
                echo json_encode($array);
                die();
            }

            if ($stmt11->rowCount() <= 0) {
                $stmt11 = null;
                $array = array("error" => "notExistingAccount");
                echo json_encode($array);
                die();
            }
        }


        $code = rand(100000, 999999);

        $sql5 = "UPDATE user SET " . $columnName . " = ?, updated_at = ? WHERE email = ?";
        $stmtCode = $this->setConnection()->prepare($sql5);

        if (!$stmtCode->execute([$code, date('Y-m-d H:i:s'), $email])) {
            $stmtCode = null;
            $array = array("error" => "stmtSendCodeFailed");
            echo json_encode($array);
            die();
        } else {
            $to = $email;
            $subject = "";
            $txt = "";
            if ($columnName === "forgot_password_code") {
                $subject = "Reset password - Paw Walks";
                $txt = "To reset your password, click to the following link: http://localhost/dog_walk/pages/active.php?code=".$code."&col=fp";
            } elseif ($columnName === "verification_code") {
                $subject = "Welcome to Paw Walks!";
                $txt = "Welcome! We are so glad you joining us! \nTo verify your email address, click to the following link: http://192.168.1.7/dog_walk/pages/active.php?code=".$code."&col=ver";
            }
            mail($to, $subject, $txt, 'From: ivonamilankovic@yahoo.com');
            //mail($to, $subject, $txt, 'From: sarababic01@yahoo.com');

        }
    }

}