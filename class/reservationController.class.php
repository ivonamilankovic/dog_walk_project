<?php


class ReservationController extends Reserve {

    private $dateOfWalk, $duration, $startLoc, $endLoc, $details, $status, $code, $rate, $customer_id, $walker_id, $dogs_id;

    //constructor
    public function __construct($dateOfWalk, $duration, $startLoc, $endLoc, $details, $status, $code, $rate, $customer_id, $walker_id, $dogs_id)
    {
        $this->dateOfWalk = $dateOfWalk;
        $this->duration = $duration;
        $this->startLoc = $startLoc;
        $this->endLoc = $endLoc;
        $this->details = $details;
        $this->status = $status;
        $this->code = $code;
        $this->rate = $rate;
        $this->walker_id = $walker_id;
        $this->dogs_id = $dogs_id;
    }

    //function for sending data to make new user
    public function reserveWalk()
    {
        if($this->emptyInput() === false){
            $array = array("error"=>"emptyInput");
            echo json_encode($array);
            return;
        }

        //function that creates users address(because it is in separate table)
        $this->createWalk($this->address, $this->city, $this->postalCode);
        //function that creates user
        $this->createWalkDogs($this->role,$this->firstName,$this->lastName,$this->email,$this->pass1, $this->phone);

        //$array = array("signup" => "done");
        //echo json_encode($array);
    }

    //function that checks if data is empty
    private function emptyInput(){
        if(empty($this->dateOfWalk) || empty($this->duration) || empty($this->startLoc) || empty($this->endLoc) || empty($this->details) || empty($this->dogs_id)){
            return false;
        }
        else{
            return  true;
        }
    }
}