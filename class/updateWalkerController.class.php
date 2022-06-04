<?php

class UpdateWalkerController extends UpdateWalker{

    private $firstName;
    private $lastName;
    private $phone;
    private $favBreed;
    private $bio;
    private $street;
    private $city;
    private $zip;
    private $email;
    private $active;

    public function __construct($firstName, $lastName, $phone, $favBreed, $bio, $street, $city, $zip, $email, $active)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->phone = $phone;
        $this->favBreed = $favBreed;
        $this->bio = $bio;
        $this->street = $street;
        $this->city = $city;
        $this->zip = $zip;
        $this->email = $email;
        $this->active = $active;
    }

    //function that will update all the data
    public function update(){

        if($this->emptyInput() === false){
            $array = array("error"=>"emptyInput");
            echo json_encode($array);
            return;
        }
        if($this->validPhoneNumber() === false){
            $array = array("error"=>"wrongPhone");
            echo json_encode($array);
            return;
        }
        if($this->validPostalCode() === false){
            $array = array( "error"=>"wrongPostalCode");
            echo json_encode($array);
            return;
        }
        if($this->containsNumbers($this->phone) === false){
            $array = array("error" => "phoneIsNotNum");
            echo json_encode($array);
            return;
        }
        if($this->containsNumbers($this->zip) === false){
            $array = array("error" => "postalCodeIsNotNum");
            echo json_encode($array);
            return;
        }

        $id = $this->getId($this->email);

        if($id !== "") {
            $this->updateUserInfo($this->firstName, $this->lastName, $this->phone, $id);
            $this->updateAddress($this->street, $this->city, $this->zip, $id);
            if($this->active != 0) {
                $this->updateFavBreed($this->favBreed, $id);
                $this->updateWalkerDetails($this->bio, $id);
            }
            $array = array("updated" => "done");
            echo json_encode($array);
        }else{
            $array = array("updated" => "failedToGetId");
            echo json_encode($array);
        }
    }


    //function that checks if data is empty
    private function emptyInput(){
        if($this->active != 0) {
            if (empty($this->email) || empty($this->firstName) || empty($this->lastName) || empty($this->favBreed) || empty($this->bio) || empty($this->phone) || empty($this->street) || empty($this->city) || empty($this->zip)) {
                return false;
            }else{
                return  true;
            }
        }else{
            if (empty($this->email) || empty($this->firstName) || empty($this->lastName) || empty($this->phone) || empty($this->street) || empty($this->city) || empty($this->zip)) {
                return false;
            }else{
                return  true;
            }
        }

    }

    //function that checks if phone number is correct length
    private function validPhoneNumber(){
        if(strlen($this->phone) !== 10){
            return false;
        }
        else{
            return true;
        }
    }

    //function that checks postal code
    private function validPostalCode(){
        if(strlen($this->zip) < 3 || strlen($this->zip) > 10){
            return false;
        }
        else{
            return  true;
        }
    }

    //function that checks if string is just numbers
    private function containsNumbers($val){
        if(!is_numeric($val)){
            return false;
        }
        else{
            return true;
        }
    }


}