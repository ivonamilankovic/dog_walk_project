<?php

class FinishWalk extends Dbconn {

    protected function setPath($path, $id_walk){
        //insert description for walk
        $sql1 = "UPDATE walk SET path = ?, status = 'finished' WHERE id = ?";
        $stmt = $this->setConnection()->prepare($sql1);

        if(!$stmt->execute([$path, $id_walk])) {
            $stmt = null;
            $array = array("error" => "stmtFinishWalkFail");
            echo json_encode($array);
            die();
        }
        $stmt = null;

    }
}