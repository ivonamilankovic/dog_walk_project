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
        $this->customer_id = $customer_id;
        $this->walker_id = $walker_id;
        $this->dogs_id = $dogs_id;
    }

    //function for sending data to make new reservation
    public function reserveWalk()
    {
        switch (true){
            case $this->isEmpty($this->dateOfWalk):
            case $this->isEmpty($this->duration):
            case $this->isEmpty($this->startLoc):
            case $this->isEmpty($this->endLoc):
            case $this->isEmpty($this->details):
            case $this->isEmpty($this->dogs_id):
                $inputisempty = true;
                header("location: ../pages/oneWalker.php?error=inputisempty".$inputisempty);
                exit();
        }

        $walk_id = $this->createWalk($this->dateOfWalk, $this->startLoc, $this->endLoc, $this->details, $this->duration, $this->status, $this->code, $this->rate, $this->customer_id, $this->walker_id);

        foreach ($this->dogs_id as $dog_id){
            $this->createWalkDogs($walk_id,$dog_id);
        }

    }

    //function that checks if data is empty
    private function isEmpty($input){
        return empty($input);
    }
}