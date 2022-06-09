<?php


class ReservationController extends Reservation {

    private $dateOfWalk, $dateEnd, $startLoc, $endLoc, $details, $status, $customer_id, $walker_id, $dogs_id;

    //constructor
    public function __construct($dateOfWalk, $dateEnd, $startLoc, $endLoc, $details, $status, $customer_id, $walker_id, $dogs_id)
    {
        $this->dateOfWalk = $dateOfWalk;
        $this->dateEnd = $dateEnd;
        $this->startLoc = $startLoc;
        $this->endLoc = $endLoc;
        $this->details = $details;
        $this->status = $status;
        $this->customer_id = $customer_id;
        $this->walker_id = $walker_id;
        $this->dogs_id = $dogs_id;
    }

    //function for sending data to make new reservation
    public function reserveWalk()
    {

        if($this->isEmpty($this->dateOfWalk) || $this->isEmpty($this->dateEnd) ||$this->isEmpty($this->startLoc) || $this->isEmpty($this->endLoc) || $this->isEmpty($this->details) || $this->isEmpty($this->status) || $this->isEmpty($this->walker_id) || $this->isEmpty($this->customer_id) || $this->isEmpty($this->dogs_id)){
            $ar = ['error' =>'empty'];
            echo json_encode($ar);
        }

        $walk_id = $this->createWalk($this->dateOfWalk, $this->startLoc, $this->endLoc, $this->details, $this->dateEnd, $this->status, $this->customer_id, $this->walker_id);

        foreach ($this->dogs_id as $dog_id){
            if(is_numeric($dog_id))
                $this->createWalkDogs($walk_id,$dog_id);
        }

        $ar = ['success' =>'done'];
        echo json_encode($ar);

    }

    //function that checks if data is empty
    private function isEmpty($input){
        return empty($input);
    }
}