<?php

class FinishWalk extends Dbconn {

    protected function finishWalk($path, $id_walk, $customer_email){
        //insert description for walk
        $sql1 = "INSERT INTO walk(path) VALUES (?) WHERE id = ?)";
        $stmt = $this->setConnection()->prepare($sql1);

        if(!$stmt->execute([$path, $id_walk, $customer_email])) {
            $stmt = null;
            $array = array("error" => "stmtFinishWalkFail");
            echo json_encode($array);
            die();
        }
        $stmt = null;

    }
}