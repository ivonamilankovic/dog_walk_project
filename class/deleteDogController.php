<?php

class deleteDogController extends Delete {
    private $dog_id;

    public function __construct($dog_id){
        $this->dog_id = $dog_id;
    }

    public function delDog(){

        //call the functions!!!!
        $this->deleteDog($this->dog_id);

        /*$array = array("createDog" => "done");
        echo json_encode($array);*/
    }
}