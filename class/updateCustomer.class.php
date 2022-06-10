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

    protected function updateUserInfo($fName,$lName,$phone,$id){
        $updateInfo = "UPDATE user SET first_name = ?, last_name = ?, phone_number = ?, updated_at = ? WHERE id = ?";
        $stmt = $this->setConnection()->prepare($updateInfo);

        if(!$stmt->execute([$fName,$lName,$phone,date('Y-m-d H:i:s') ,$id])){
            $stmt = null;
            $array = array("error" => "stmtUpdateUserInfoFailed");
            echo $stmt;
            echo json_encode($array);
            die();
        }
        $stmt = null;
    }
    private function getAddrID($idUser){
        $sqlGetId = "SELECT address_id FROM user WHERE id =?";
        $stmt = $this->setConnection()->prepare($sqlGetId);
        if(!$stmt->execute([$idUser])){
            $stmt = null;
            $array = array("error" => "stmtGetAddressIDFailed");
            echo json_encode($array);
            die();
        }
        $addrid= $stmt->fetch(PDO::FETCH_ASSOC);
        return $addrid['address_id'];
    }

    protected function updateAddress($street,$city,$zipCode,$id){
        $idAdr = $this->getAddrID($id);
        $updateAddress = "UPDATE address SET street = ?, city = ?, postal_code = ? WHERE id = ?";
        $stmt = $this->setConnection()->prepare($updateAddress);

        if(!$stmt->execute([$street,$city,$zipCode,$idAdr])){
            $stmt = null;
            $array = array("error" => "stmtUpdateAddressFailed");
            echo json_encode($array);
            die();
        }
        $stmt = null;

    }
}