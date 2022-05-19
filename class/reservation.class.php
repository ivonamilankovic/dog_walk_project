<?php

class Reserve extends Dbconn {

    private $addressID;

    protected function createWalk($dateOfWalk, $startLoc, $endLoc, $details, $duration, $status, $code, $rate, $customer_id, $walker_id){
        //inserts users data in user table
        $sql1 = "INSERT INTO walk(walk_date, start_location, end_location, description, duration, status, code, rate, customer_id, walker_id) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->setConnection()->prepare($sql1);

        if(!$stmt->execute([$dateOfWalk, $startLoc, $endLoc, $details, $duration, $status, $code, $rate, $customer_id, $walker_id])) {
            $stmt = null;
            $array = array("error" => "stmtCreateReservationFail");
            echo json_encode($array);
            die();
        }
        $stmt = null;

    }

    protected function createWalkDogs($walk_id, $dog_id)
    {
        //inserts address in address table
        $sql2 = "INSERT INTO walk_dogs (walk_id, dog_id) VALUES (?,?)";
        $stmt1 = $this->setConnection()->prepare($sql2);

        if (!$stmt1->execute([$walk_id, $dog_id])) {
            $stmt1 = null;
            $array = array("error" => "stmtCreateWalkFail");
            echo json_encode($array);
            die();
        }
        $stmt1 = null;
    }
}