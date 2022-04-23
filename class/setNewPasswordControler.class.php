<?php

class SetNewPasswordControler extends SetNewPassword{

    private $newPass1, $newPass2, $value, $column;

    //constructor
    public function __construct($newPass1,$newPass2,$value, $column){
        $this->newPass1 = $newPass1;
        $this->newPass2 = $newPass2;
        $this->value = $value;
        $this->column = $column;
    }

    //function that checks password and code
    public function setPassword(){

        if($this->passLength() === false){
            $array = array("error"=>"passwordWrongLength");
            echo json_encode($array);
            return;
        }
        if($this->passMatch() === false){
            $array = array("error"=>"passwordsDontMatch");
            echo json_encode($array);
            return;
        }

        //sets new password in db
        $this->makeNewPassword($this->newPass1, $this->value, $this->column);

        $array = array( "newPassword" => "set");
        echo json_encode($array);

    }

    //function that checks if passwords match
    private function passMatch(){
        if($this->newPass1 !== $this->newPass2){
            return false;
        }
        else{
            return true;
        }
    }

    //function that checks password length
    private function passLength(){
        if(strlen($this->newPass1) < 6 || strlen($this->newPass1) > 15 || strlen($this->newPass2) < 6 || strlen($this->newPass2) > 15){
            return false;
        }
        else{
            return true;
        }
    }

}