<?php

class CheckFreeReservationController extends CheckFreeReservation{

    private $dateFrom, $dateTo, $walker_id;

    public function __construct($dateFrom, $dateTo, $walker_id)
    {
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
        $this->walker_id = $walker_id;
    }

    public function checkRes(){
        if($this->ifEmpty() === false){
            $ar = [ 'error' => 'emptyDates'];
            echo json_encode($ar);
            die();
        }

        $this->checkResInDB($this->dateFrom, $this->dateTo, $this->walker_id);

        $ar = ['success' => 'ok'];
        echo json_encode($ar);
    }


    private function ifEmpty(){
        if(empty($this->dateTo) || empty($this->dateFrom) || empty($this->walker_id)){
            return false;
        }
        else{
            return true;
        }
    }


}
