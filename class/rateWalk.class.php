<?php

class RateWalk extends Dbconn {

    protected function setRate($rate, $id_walk){
        //insert description for walk
        $sql1 = "UPDATE walk SET rate = ? WHERE id = ?";
        $stmt = $this->setConnection()->prepare($sql1);

        if(!$stmt->execute([$rate, $id_walk])) {
            $stmt = null;
            $array = array("error" => "stmtFinishWalkFail");
            echo json_encode($array);
            die();
        }
        $stmt = null;

    }
}