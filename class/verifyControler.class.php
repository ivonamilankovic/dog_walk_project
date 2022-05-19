<?php

class VerifyControler extends Verify{

    private $code, $columnName;

    //constructor
    public function __construct($code, $columnName){
        $this->code = $code;
        $this->columnName = $columnName;
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
        return  $this->codeMatch($this->code, $this->columnName);

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
    //function that checks if code is correct length
    private function codeLength(){
        if(strlen($this->code) !== 6){
            return false;
        }
        else{
            return true;
        }
    }
}