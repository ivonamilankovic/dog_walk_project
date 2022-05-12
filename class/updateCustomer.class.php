<?php

class UpdateCustomer extends Dbconn{

    protected function getId($email){
        $sqlGetId = "SELECT id FROM user WHERE email = ?";
        $stmt = $this->setConnection()->prepare($sqlGetId);
        if(!$stmt->execute([$email])){
            $stmt = null;
            $array = array("error" => "stmtGetIDFailed");
            echo json_encode($array);
            die();
        }
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user['id'];

    }

    protected function updateUserInfo($fName,$lName,$phone,$image,$id){
        $updateInfo = "UPDATE user SET first_name = ?, last_name = ?, phone_number = ?, picture = ?, updated_at = ? WHERE id = ?";
        $stmt = $this->setConnection()->prepare($updateInfo);

        if(!$stmt->execute([$fName,$lName,$phone,$image,date('Y-m-d H:i:s') ,$id])){
            $stmt = null;
            $array = array("error" => "stmtUpdateUserInfoFailed");
            echo $stmt;
            echo json_encode($array);
            die();
        }
        $stmt = null;
    }

    protected function updateAddress($street,$city,$zipCode,$id){
        $updateAddress = "UPDATE address SET street = ?, city = ?, postal_code = ? WHERE id = ?";
        $stmt = $this->setConnection()->prepare($updateAddress);

        if(!$stmt->execute([$street,$city,$zipCode,$id])){
            $stmt = null;
            $array = array("error" => "stmtUpdateAddressFailed");
            echo json_encode($array);
            die();
        }
        $stmt = null;

    }
}