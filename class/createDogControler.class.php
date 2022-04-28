<?php

class createDogControler extends Create{
    private $dogName;
    private $dogGender;
    private $dogAge;
    private $breed_id;
    private $notes;
    private $owner_id;

    public function __construct($dogName, $dogGender, $dogAge, $breed_id, $notes, $owner_id){
        $this->dogName = $dogName;
        $this->dogGender = $dogGender;
        $this->dogAge = $dogAge;
        $this->breed_id = $breed_id;
        $this->notes = $notes;
        $this->owner_id = $owner_id;
    }

    public function createDog(){
        switch (true){
            case $this->isEmpty($this->dogName):
            case $this->isEmpty($this->dogAge):
            case $this->isEmpty($this->notes):
                $inputisempty = true;
                header("location: ../customer_dashboard/createDog.php?error=inputisempty".$inputisempty);
                exit();
        }

        if($this->invalidAge()==false){
            header("location: ../customer_dashboard/createDog.php?error=invalidage");
            exit();
        }

        switch (true){
            case $this->isChoose($this->breed_id):
            case $this->isChoose($this->dogGender):
                $inputischoose = true;
                header("location: ../customer_dashboard/createDog.php?error=inputisempty".$inputischoose);
                exit();
        }

        //call the functions!!!!
        $this->setDog($this->dogName, $this->dogGender, $this->dogAge, $this->notes, $this->breed_id, $this->owner_id);

    }

    private function isEmpty($input){
        return empty($input);
    }

    private function isChoose($input){
        if(isset($_POST['choose'])){
            return false;
        }

    }

    private function invalidAge(){
        $result = true;
        if($this->dogAge < 0 && $this->dogAge >= 30){
            $result = false;
        }
        return $result;
    }

}