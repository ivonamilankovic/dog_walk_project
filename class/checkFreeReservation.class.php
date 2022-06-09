<?php

class CheckFreeReservation extends Dbconn{

    protected function checkResInDB($dateFrom, $dateTo, $walker_id){
        $sql = "select id from walk where ((walk_date BETWEEN '".$dateFrom."' and '".$dateTo."' ) or 
                           (walk_end BETWEEN '".$dateFrom."' and '".$dateTo."') or 
                           ( '".$dateFrom."' BETWEEN walk_date and walk_end) or 
                           ( '".$dateTo."' BETWEEN walk_date and walk_end)) and walker_id=?";
        $stmt = $this->setConnection()->prepare($sql);
        if(!$stmt->execute([$walker_id])){
            $ar = [ 'error' => $stmt->errorInfo() ];
            echo json_encode($ar);
            exit();
        }
        if($stmt->rowCount()>0){
            $ar = [ 'error' => 'dateTaken'];
            echo json_encode($ar);
            die();
        }
        $stmt=null;
    }

}