<?php

class Verify extends Dbconn{

    //function that gets code from db and see if the codes match
    protected function codeMatch($code){

        $sql = "SELECT * FROM user WHERE verification_code = ?";
        $stmt = $this->setConnection()->prepare($sql);

        if(!$stmt->execute([$code])){
            $stmt = null;
            $array = array("error" => "stmtCheckCodeFailed");
            echo json_encode($array);
            die();
        }
        else{
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $sql2 = "UPDATE user SET is_verified = 1, updated_at = ? WHERE id = ?";
            $stmt2 = $this->setConnection()->prepare($sql2);

            if(!$stmt2->execute([date('Y-m-d H:i:s'), $user['id']])){
                $stmt2 = null;
                $array = array("error" => "stmtGetVerifiedFailed");
                echo json_encode($array);
                die();
            }

        }
    }

}