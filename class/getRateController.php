<?php

class GetRateController extends GetRate {

    private $id_walk, $columnName;

    //constructor
    public function __construct($id_walk,$columnName){
        $this->id_walk=$id_walk;
        $this->columnName = $columnName;
    }

    //function that sends code
    public function getCode(){
        //actual function that sends code
        $this->sendRateCode($this->id_walk, $this->columnName);

        $array = array("verify" => "sent");
        echo json_encode($array);
    }

}