<?php

class Signup extends Dbconn {

    private $addressID;//, $userID;

    protected function createUser($role, $firstName, $lastName, $email, $password, $phone){
        //inserts users data in user table
        $sql1 = "INSERT INTO user(role,first_name,last_name,email,password,phone_number,address_id,is_verified, created_at, updated_at) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->setConnection()->prepare($sql1);
        $hashedPassword = password_hash($password,PASSWORD_BCRYPT);

        if(!$stmt->execute([$role,$firstName,$lastName,$email,$hashedPassword,$phone,$this->addressID,0,date('Y-m-d H:i:s'),date('Y-m-d H:i:s')])){
            $stmt = null;
            header("location: ../home.php?error=stmt0Failed");
            exit();
        }
        /*
        else{
            $this->userID = $conn->lastInsertedId();
        }*/
        $stmt = null;

    }


    protected function createAddress($address, $city, $postalCode){
        //inserts address in address table
        $sql2 = "INSERT INTO address (street, city, postal_code) VALUES (?,?,?)";
        $stmt1 = $this->setConnection()->prepare($sql2);

        if(!$stmt1->execute([$address, $city, $postalCode])){
            $stmt1 = null;
            header("location: ../home.php?error=stmt1Failed");
            exit();
        }
        else{
            $this->addressID = $conn->lastInsertedId();
        }
        $stmt1 = null;
/*
        //inserts id of address in user table
        $sql3 = "UPDATE user SET address_id = ".$this->addressID." WHERE id = ".$this->userID;
        $stmt2 = $this->setConnection()->prepare($sql3);

        if(!$stmt2->execute()){
            $stmt2 = null;
            header("location: ./home.php?error=stmt2Failed");
            exit();
        }
        $stmt2 = null;*/
    }

    //function that checks if email is already taken by some other user
    protected function isEmailTaken($email){
        $sql4 = "SELECT * FROM user WHERE email = ".$email;
        $stmt3 = $this->setConnection()->prepare($sql4);

        if(!$stmt3->execute()){
            $stmt3 = null;
            header("location: ../home.php?error=stmt3Failed");
            exit();
        }

        if($stmt3->rowCount()>0){
            return true;
        }
        else{
            return false;
        }

    }

}