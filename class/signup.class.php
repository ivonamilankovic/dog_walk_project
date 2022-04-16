<?php

class Signup extends Dbconn {

    private $addressID;//, $userID;

    protected function createUser($role, $firstName, $lastName, $email, $password, $phone){
        //inserts users data in user table
        $sql1 = "INSERT INTO user(role,first_name,last_name,email,password,phone_number,address_id,is_verified, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->setConnection()->prepare($sql1);
        $hashedPassword = password_hash($password,PASSWORD_BCRYPT);

        if(!$stmt->execute([$role,$firstName,$lastName,$email,$hashedPassword,$phone,$this->addressID,0,date('Y-m-d H:i:s'),date('Y-m-d H:i:s')])) {
            $stmt = null;
            $array = array("error" => "stmtCreateUserFail");
            echo json_encode($array);
            die();
        }
        $stmt = null;

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

    //function that generates and send verification code to users email address
    protected function sendVerificationCode($email){
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
            $txt = "Your verification code is: " . $code . "\n
                Enter your code here: url";
            mail($to, $subject, $txt, 'From: ivonamilankovic@yahoo.com');

        }
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