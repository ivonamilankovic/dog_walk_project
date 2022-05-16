<?php

class Verify extends Dbconn{

    //function that gets code from db and see if the codes match
    protected function codeMatch($code, $columnName){

        $sql = "SELECT * FROM user WHERE ".$columnName." = ?";
        $stmt = $this->setConnection()->prepare($sql);

        if(!$stmt->execute([$code])){
            $stmt = null;
            $array = array("error" => "stmtCheckCodeFailed");
            echo json_encode($array);
            die();
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $sql2 = "";

        if($columnName === "verification_code") {
            $sql2 = "UPDATE user SET is_verified = 1, updated_at = ?, verification_code = null, registration_expires = null WHERE id = ?  AND registration_expires>now()";
        }
        elseif($columnName === "forgot_password_code"){
            $sql2 = "UPDATE user SET updated_at = ?, forgot_password_code = null WHERE id = ?  AND registration_expires>now()";
        }

        $stmt2 = $this->setConnection()->prepare($sql2);
        if (!$stmt2->execute([date('Y-m-d H:i:s'), $user['id']])) {
            $stmt2 = null;
        }
        if($stmt2->rowCount()<=0) {

            //ne izvrsi brisanje???
            $sql3 = "DELETE FROM user WHERE user.id = ?";
            $stmt3 = $this->setConnection()->prepare($sql3);
            if (!$stmt3->execute([$user['id']])) {
                $stmt3 = null;
            }
            return false;
        }
        return true;
    }

}