<?php

class Login extends Dbconn{

    //function that checks if email and password are good and if they are it logs user
    protected function getUser($username,$password){
        $sql = "SELECT * FROM user WHERE email=?";
        $stmt = $this->setConnection()->prepare($sql);

        if(!$stmt->execute([$username])){
            $stmt = null;
            $array = array("error" => "stmtGetUserFailed");
            echo json_encode($array);
            die();
        }

        if($stmt->rowCount()<=0){
            $stmt = null;
            $array = array("error" => "userNotFound");
            echo json_encode($array);
            die();
        }

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user['is_verified'] == 1) {

            $checkPass = password_verify($password, $user["password"]);

            if ($checkPass === false) {
                $stmt = null;
                $array = array("error" => "passwordIncorrect");
                echo json_encode($array);
                die();
            } elseif ($checkPass === true) {
                session_start();
                $_SESSION['id'] = $user["id"];
                $_SESSION['role'] = $user['role'];
                $_SESSION['timestamp'] = time();
            }
        }
        else{
            $array = array("error" => "userNotVerified");
            echo json_encode($array);
            die();
        }

    }
}