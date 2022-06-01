<?php

class UpdateWalker extends Dbconn{


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

    private function ifExists($id, $table){
        $sqlFindWalker = "SELECT * FROM ".$table." WHERE walker_id = ?";
        $stmt = $this->setConnection()->prepare($sqlFindWalker);
        if(!$stmt->execute([$id])){
            $stmt = null;
            $array = array("error" => "stmtIfExistInTableFailed");
            echo json_encode($array);
            die();
        }
        if($stmt->rowCount()>0){
            return true;
        }
        else{
            return false;
        }
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

    protected function updateAddress($street,$city,$zipCode, $idUser){
        $id = $this->getAddrID($idUser);
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

    protected function updateWalkerDetails($bio,$id){
        //first we have to check if they have some data in db if yes-update else -insert
        $existsAlready = $this->ifExists($id,"walker_details");
        if($existsAlready) {
            //yes
            $updateDetails = "UPDATE walker_details SET biography = ? WHERE walker_id = ?";
            $stmt1 = $this->setConnection()->prepare($updateDetails);
            if (!$stmt1->execute([$bio, $id])) {
                $stmt1 = null;
                $array = array("error" => "stmtUpdateWalkerDetailsFailed");
                echo json_encode($array);
                die();
            }
            $stmt = null;
        }
        else{
            //no
            $inserDetails = "INSERT INTO walker_details(biography,is_active,walker_id) VALUES (?,1,?);";
            $stmt2 = $this->setConnection()->prepare($inserDetails);
            if (!$stmt2->execute([$bio, $id])) {
                $stmt2 = null;
                $array = array("error" => "stmtInsertWalkerDetailsFailed");
                echo json_encode($array);
                die();
            }
            $stmt = null;
        }
    }

    protected function updateFavBreed($favBreed,$id){
        //first we have to check if they have some data in db if yes-update else -insert
        $existsAlready = $this->ifExists($id,"walker_favourite_breeds");
        if($existsAlready) {
            //yes
            $updateFavBreed = "UPDATE walker_favourite_breeds SET breed_id = ? WHERE walker_id = ?";
            $stmt1 = $this->setConnection()->prepare($updateFavBreed);
            if (!$stmt1->execute([$favBreed, $id])) {
                $stmt1 = null;
                $array = array("error" => "stmtUpdateFavBreedFailed");
                echo json_encode($array);
                die();
            }
            $stmt = null;
        }else{
            //no
            $inserDetails = "INSERT INTO walker_favourite_breeds(breed_id,walker_id) VALUES (?,?);";
            $stmt2 = $this->setConnection()->prepare($inserDetails);
            if (!$stmt2->execute([$favBreed, $id])) {
                $stmt2 = null;
                $array = array("error" => "stmtInsertFavBreedFailed");
                echo json_encode($array);
                die();
            }
            $stmt = null;
        }
    }

}