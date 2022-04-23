<?php

class SetNewPassword extends Dbconn{

    //function that sets new password in db
    protected function makeNewPassword($password, $fpCode){

        $hashedPassword =  password_hash($password,PASSWORD_BCRYPT);

        $sql = "UPDATE user SET password = ?, updated_at =? WHERE forgot_password_code = ?";
        $stmt = $this->setConnection()->prepare($sql);

        if(!$stmt->execute([$hashedPassword,date('Y-m-d H:i:s'),$fpCode])){
            $stmt = null;
            $array = array("error" => "stmtSetNewPasswordFailed");
            echo json_encode($array);
            die();
        }
    }
}