<?php

class LoginControler extends Login {

    private $username, $password;

    //constructor
    public function __construct($username,$password){
        $this->username = $username;
        $this->password = $password;
    }

    //function that log user on page
    public function LogUser(){
        if($this->emptyInput() === true){
            $array = array("error" => "emptyInput");
            echo json_encode($array);
            return;
        }
        if($this->checkEmail() === false){
            $array = array("error"=>"wrongEmail");
            echo json_encode($array);
            return;
        }

        //check data about user in database
        $this->getUser($this->username,$this->password);

        $array = array( "login" => "done");
        echo json_encode($array);
    }

    //function that checks if inputs are empty
    private function emptyInput(){
        if(empty($this->username) || empty($this->password)){
            return true;
        }
        else{
            return false;
        }
    }
    //function that checks if email is in correct format
    private function checkEmail(){
        if(!filter_var($this->username, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        else{
            return true;
        }
    }
}