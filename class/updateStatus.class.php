<?php

class UpdateStatus extends Dbconn{



    protected function updateWalkStatus($status,$id_walk){

        $updateInfo = "UPDATE walk SET status = ? WHERE id = ?";
        $stmt = $this->setConnection()->prepare($updateInfo);

        if(!$stmt->execute([$status,$id_walk])){
            $stmt = null;
            $array = array("error" => "stmtUpdateStatusFailed");
            echo $stmt;
            echo json_encode($array);
            die();
        }
        $stmt = null;
    }

}