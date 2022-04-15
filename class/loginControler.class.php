<?php

class LoginControler extends Login {

    private $username, $password;

    public function __construct($username,$password){
        $this->username = $username;
        $this->password = $password;
    }

    public function LogUser(){
        if($this->emptyInput() === true){
            $array = array(
                "error" => "emptyInput"
            );
            echo json_encode($array);
            return;
        }

        //check data about user in database
        $this->getUser($this->username,$this->password);

        $array = array( "all" => "done");
        echo json_encode($array);
    }

    private function emptyInput(){
        if(empty($this->username) || empty($this->password)){
            return true;
        }
        else{
            return false;
        }
    }
}