<?php

class GetVerificationControler extends GetVerification{

    private $email;

    //constructor
    public function __construct($email){
        $this->email=$email;
    }

    //function that sends code
    public function getCode(){
        if($this->emptyInput() === true){
            $array = array("error" => "emptyInput");
            echo json_encode($array);
            return;
        }
        if($this->checkEmail() === false){
            $array = array("error" => "emailWrong");
            echo json_encode($array);
            return;
        }

        //actual function that sends code
        $this->sendVerificationCode($this->email);

        $array = array("verify" => "sent");
        echo json_encode($array);
    }

    //function that check empty input
    private function emptyInput(){
        if(!empty($this->email)){
            return false;
        }
        else{
            return  true;
        }
    }

    //function that checks if email is in correct format
    private function checkEmail(){
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        else{
            return true;
        }
    }
}