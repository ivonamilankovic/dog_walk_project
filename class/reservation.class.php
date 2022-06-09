<?php

class Reservation extends Dbconn {

    protected function createWalk($dateOfWalk, $startLoc, $endLoc, $details, $dateEnd, $status, $customer_id, $walker_id){
        $pdo = $this->setConnection();
        $pdoStatement = $pdo->prepare('INSERT INTO walk(walk_date, start_location, end_location, description, walk_end, status, customer_id, walker_id) VALUES (?,?,?,?,?,?,?,?)');

        if(!$pdoStatement->execute([$dateOfWalk, $startLoc, $endLoc, $details, $dateEnd, $status, $customer_id, $walker_id])) {
            $pdoStatement = null;
            $array = array("error" => "stmtCreateReservationFail");
            echo json_encode($array);
            die();
        }
        $walk_id = $pdo->lastInsertId();
        $pdoStatement = null;
        $this->sendMail($walker_id);
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

    private function sendMail($walker_id){
        $sql = "SELECT email FROM user WHERE id = ? ";
        $stmt = $this->setConnection()->prepare($sql);
        if(!$stmt->execute([$walker_id])){
            $stmt = null;
            $array = array("error" => "stmtGetWalkerEmailFailed");
            echo json_encode($array);
            die();
        }
        $walker = $stmt->fetch(PDO::FETCH_ASSOC);
        $txt = "You have new request for walk. Please go to your profile to confirm or decline.";
        $subject = "New reservation request for you! - Paw Walks";
        mail($walker['email'], $subject,$txt, 'From: ivonamilankovic@yahoo.com');
    }

}