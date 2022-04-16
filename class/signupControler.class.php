<?php


class SignupControler extends Signup {

    private $role, $firstName, $lastName, $email, $pass1, $pass2, $phone, $address, $city, $postalCode;

    //constructor
    public function __construct($role, $firstName, $lastName, $email, $pass1, $pass2, $phone, $address, $city, $postalCode)
    {
        $this->role = $role;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->pass1 = $pass1;
        $this->pass2 = $pass2;
        $this->phone = $phone;
        $this->address = $address;
        $this->city = $city;
        $this->postalCode = $postalCode;
    }

    //function for sending data to make new user
    public function signupUser()
    {
        if($this->emptyInput() === false){
            $array = array("error"=>"emptyInput");
             echo json_encode($array);
             return;
        }
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
        if($this->checkEmail() === false){
            $array = array("error"=>"wrongEmail");
            echo json_encode($array);
            return;
        }
        if($this->validPhoneNumber() === false){
            $array = array("error"=>"wrongPhone");
            echo json_encode($array);
            return;
        }
        if($this->validRole() === false){
            $array = array("error"=>"wrongRole");
            echo json_encode($array);
            return;
        }
        if($this->validPostalCode() === false){
            $array = array( "error"=>"wrongPostalCode");
            echo json_encode($array);
            return;
        }

        if($this->isEmailTaken($this->email) === true){
            $array = array("error"=>"emailAlreadyTaken");
            echo json_encode($array);
            return;
        }

        //function that creates users address(because it is in separate table)
        $this->createAddress($this->address, $this->city, $this->postalCode);
        //function that creates user
        $this->createUser($this->role,$this->firstName,$this->lastName,$this->email,$this->pass1, $this->phone);
        //function that sends verification code
        $this->sendVerificationCode($this->email);

        $array = array("signup" => "done");
        echo json_encode($array);
    }

    //function that checks if data is empty
    private function emptyInput(){
        if(empty($this->role) || empty($this->firstName) || empty($this->lastName) || empty($this->email) || empty($this->pass1) || empty($this->pass2) || empty($this->phone) || empty($this->address) || empty($this->city) || empty($this->postalCode)){
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

    //function that checks if passwords match
    private function passMatch(){
        if($this->pass1 !== $this->pass2){
            return false;
        }
        else{
            return true;
        }
    }

    //function that checks password length
    private function passLength(){
        if(strlen($this->pass1) < 6 || strlen($this->pass1) > 15 || strlen($this->pass2) < 6 || strlen($this->pass2) > 15){
            return false;
        }
        else{
            return true;
        }
    }

    //function that checks if phone number is correct length and if its just numbers
    //  !!!!!!!!!!!!!!!!!!!DODATI DA PROVERI DA LI SU SAMO BROJEVI !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    private function validPhoneNumber(){
        if(strlen($this->phone) !== 10){
            return false;
        }
        else{
            return true;
        }
    }

    //function that checks if role is one of three possibilities: customer, walker, or admin
    private function validRole(){
        if($this->role == "customer" || $this->role == "walker" || $this->role == "admin"){
            return true;
        }
        else{
            return false;
        }
    }

    //function that checks if postal code has only 5 digits
    private function validPostalCode(){
        if(strlen($this->postalCode) !== 5){
            return false;
        }
        else{
            return  true;
        }
    }

}