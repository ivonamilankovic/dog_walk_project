<?php

class Reserve extends Dbconn {

    protected function createWalk($dateOfWalk, $startLoc, $endLoc, $details, $duration, $status, $code, $rate, $customer_id, $walker_id){
        $pdo = $this->setConnection();
        $pdoStatement = $pdo->prepare('INSERT INTO walk(walk_date, start_location, end_location, description, duration, status, code, rate, customer_id, walker_id) VALUES (?,?,?,?,?,?,?,?,?,?)');

        if(!$pdoStatement->execute([$dateOfWalk, $startLoc, $endLoc, $details, $duration, $status, $code, $rate, $customer_id, $walker_id])) {
            $pdoStatement = null;
            $array = array("error" => "stmtCreateReservationFail");
            echo json_encode($array);
            die();
        }
        $walk_id = $pdo->lastInsertId();
        $pdoStatement = null;
        return $walk_id;
    }

    protected function createWalkDogs($walk_id, $dogs_id)
    {
        //var_dump($walk_id); die();
        //inserts address in address table
        $sql = "INSERT INTO walk_dogs (walk_id, dog_id) VALUES (?,?)";
        $stmt = $this->setConnection()->prepare($sql);

        if (!$stmt->execute([$walk_id, $dogs_id])) {
            $stmt = null;
            $array = array("error" => "stmtCreateWalkFail");
            echo json_encode($array);
            die();
        }
        $stmt = null;
    }
}