<?php


class FinishWalkController extends FinishWalk {

    private $path, $id_walk;

    //constructor
    public function __construct($path, $id_walk)
    {
        $this->path = $path;
        $this->id_walk = $id_walk;
    }

    //function for sending data to make new user
    public function finish()
    {
        if($this->emptyInput() === false){
            $array = array("error"=>"emptyInput");
            echo json_encode($array);
            return;
        }

        $this->setPath($this->path, $this->id_walk);
    }

    private function emptyInput(){
        if(empty($this->path)){
            return false;
        }
        else{
            return  true;
        }
    }

}