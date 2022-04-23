<?php

class SetNewPassword extends Dbconn{

    //function that sets new password in db
    protected function makeNewPassword($password, $value, $column){

        $hashedPassword =  password_hash($password,PASSWORD_BCRYPT);

        $sql = "UPDATE user SET password = ?, updated_at =? WHERE ".$column." = ?";
        $stmt = $this->setConnection()->prepare($sql);

        if(!$stmt->execute([$hashedPassword,date('Y-m-d H:i:s'),$value])){
            $stmt = null;
            $array = array("error" => "stmtSetNewPasswordFailed");
            echo json_encode($array);
            die();
        }
    }
}