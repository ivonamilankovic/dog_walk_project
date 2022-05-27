<?php

class UpdateStatusController extends UpdateStatus{

    private $status;
    private $id_walk;


    public function __construct($status, $id_walk)
    {
        $this->status = $status;
        $this->id_walk = $id_walk;
    }

    //function that will update all the data
    public function updateStatus()
    {

            $this->updateWalkStatus($this->status, $this->id_walk);

            $array = array("updated" => "done");
            echo json_encode($array);
    }

}