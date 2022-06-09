<?php

class Signup extends Dbconn {

    private $addressID;

    protected function createUser($role, $firstName, $lastName, $email, $password, $phone){
        //inserts users data in user table
        $sql1 = "INSERT INTO user(role,first_name,last_name,email,password,phone_number,address_id,is_verified, created_at, updated_at, registration_expires, is_banned) VALUES (?,?,?,?,?,?,?,?,?,?,DATE_ADD(now(),INTERVAL 2 HOUR ),?)";
        $stmt = $this->setConnection()->prepare($sql1);
        $hashedPassword = password_hash($password,PASSWORD_BCRYPT);

        if(!$stmt->execute([$role,$firstName,$lastName,$email,$hashedPassword,$phone,$this->addressID,0,date('Y-m-d H:i:s'),date('Y-m-d H:i:s'), 0 ])) {
            $stmt = null;
            $array = array("error" => "stmtCreateUserFail");
            echo json_encode($array);
            die();
        }
        $stmt = null;

        //if its walker set to be not active until admin gives him permission
        if($role === "walker"){

            $sqlGetId = "SELECT MAX(id) as id FROM user ";
            $stmtid = $this->setConnection()->prepare($sqlGetId);

            if(!$stmtid->execute()) {
                $stmtid = null;
                $array = array("error" => "stmtGetIdFailed");
                echo json_encode($array);
                die();
            }
            $id = $stmtid->fetch();
            $stmtid = null;

            $sqlW = "INSERT INTO walker_details(is_active, walker_id) VALUES (0,?)";
            $stmt = $this->setConnection()->prepare($sqlW);

            if(!$stmt->execute([$id['id']])) {
                $stmt = null;
                $array = array("error" => "stmtCreateWalkerDetailsFail");
                echo json_encode($array);
                die();
            }
        }

    }

    protected function createAddress($address, $city, $postalCode)
    {
        //inserts address in address table
        $sql2 = "INSERT INTO address (street, city, postal_code) VALUES (?,?,?)";
        $stmt1 = $this->setConnection()->prepare($sql2);

        if (!$stmt1->execute([$address, $city, $postalCode])) {
            $stmt1 = null;
            $array = array("error" => "stmtCreateAddressFail");
            echo json_encode($array);
            die();
        } else {
            $sqlLastID = "SELECT id FROM address ORDER BY id DESC LIMIT 1";
            $stmtLastID = $this->setConnection()->prepare($sqlLastID);
            if (!$stmtLastID->execute()) {
                $stmtLastID = null;
                $array = array("error" => "stmtLastAddressIDFail");
                echo json_encode($array);
                die();
            } else {
                while ($row = $stmtLastID->fetch(PDO::FETCH_ASSOC)) {
                    $this->addressID = $row['id'];
                }
            }

        }
        $stmt1 = null;
    }

    //function that checks if email is already taken by some other user
    protected function isEmailTaken($email){
        $sql4 = "SELECT * FROM user WHERE email = ?";
        $stmt3 = $this->setConnection()->prepare($sql4);

        if(!$stmt3->execute([$email])){
            $stmt3 = null;
            $array = array("error"=>"stmtIsEmailTakenFail");
            echo json_encode($array);
            die();
        }

        if($stmt3->rowCount()>0){
            return true;
        }
        else{
            return false;
        }

    }

}