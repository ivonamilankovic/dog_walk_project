<?php

class VerifyControler extends Verify{

    private $code;

    //constructor
    public function __construct($code){
        $this->code = $code;
    }

    //function that checks if code is right
    public function checkCode(){
        if($this->emptyCode() === true){
            $array = array("error" => "emptyCode");
            echo json_encode($array);
            return;
        }
        if($this->codeLength() === false){
            $array = array("error" => "wrongLengthCode");
            echo json_encode($array);
            return;
        }
        //checks code match with the one in db
        $this->codeMatch($this->code);

        $array = array("verify" => "done");
        echo json_encode($array);
    }

    //function that checks if code is empty
    private function emptyCode(){
        if(!empty($this->code)){
            return false;
        }
        else{
            return true;
        }
    }
    private function codeLength(){
        if(strlen($this->code) !== 6){
            return false;
        }
        else{
            return true;
        }
    }
}