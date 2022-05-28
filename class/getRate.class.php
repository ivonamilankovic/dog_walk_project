<?php

class GetRate extends Dbconn
{

    //function that generates and send verification code to users email address
    protected function sendRateCode($id_walk, $columnName)
    {
        $sql = "SELECT user.email, walk.status FROM user 
                INNER JOIN walk ON user.id = walk.customer_id
                WHERE walk.id = ?";
        $stmt = $this->setConnection()->prepare($sql);
        if (!$stmt->execute([$id_walk])) {
            $stmt = null;
            $array = array("error" => "stmtFindUserEmailFailed");
            echo json_encode($array);
            die();
        }
        else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $email = $result['email'];
            $status = $result['status'];
        }



            /*$sql11 = "SELECT * FROM user WHERE email = ?";
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
            }*/



        $code = rand(100000, 999999);

        $sql5 = "UPDATE walk SET " . $columnName . " = ? WHERE id = ?";
        $stmtCode = $this->setConnection()->prepare($sql5);

        if (!$stmtCode->execute([$code, $id_walk])) {
            $stmtCode = null;
            $array = array("error" => "stmtSendCodeFailed");
            echo json_encode($array);
            die();
        } else {
            $to = $email;
            $subject = "";
            $txt = "";
            if ($columnName === "code") {
                $subject = "Paw walks sends you code to rate the walk!";
                $txt = "To rate a walk, click to the following link: http://localhost/dog_walk/customer_dashboard/rateWalk.php?code=".$code."&id_walk=".$id_walk;
            }
            //mail($to, $subject, $txt, 'From: ivonamilankovic@yahoo.com');
            mail($to, $subject, $txt, 'From: sarababic01@yahoo.com');

        }
    }

}