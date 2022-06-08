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
        $this->sendMail($id_walk);
    }

    private function sendMail($walk_id){
        $sql = "SELECT user.email, walk.status FROM user INNER JOIN walk ON walk.customer_id = user.id WHERE walk.id = ?";
        $stmt = $this->setConnection()->prepare($sql);
        if(!$stmt->execute([$walk_id])){
            $stmt = null;
            $array = array("error" => "stmtGetWalkerEmailFailed");
            echo json_encode($array);
            die();
        }
        $customer = $stmt->fetch(PDO::FETCH_ASSOC);

        if($customer['status'] === "declined"){
            $txt = "We are sorry to inform you that your request for walk was declined. Check out other walkers on http://192.168.1.7/dog_walk/pages/allWalkers.php or try some other time!\nWe hope your next request will be accepted";
            $subject = "Declined walk - Paw Walks";
        }elseif($customer['status'] === "confirmed"){
            $txt = "Good news! Your request for walk is accepted!\nAfter the walk finishes, you'll get mail to rate your walker!";
            $subject = "Confirmed walk - Paw Walks";
        }

        mail($customer['email'], $subject,$txt, 'From: ivonamilankovic@yahoo.com');
    }

}