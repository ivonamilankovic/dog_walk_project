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
            header("location: ../home.php?error=emptyInput");
            exit();
        }
        if($this->passLength() === false){
            header("location: ../home.php?error=passwordWrongLength");
            exit();
        }
        if($this->passMatch() === false){
            header("location: ../home.php?error=passwordsDontMatch");
            exit();
        }
        if($this->checkEmail() === false){
            header("location: ../home.php?error=wrongEmail");
            exit();
        }
        if($this->validPhoneNumber() === false){
            header("location: ../home.php?error=wrongPhone");
            exit();
        }
        if($this->validRole() === false){
            header("location: ../home.php?error=wrongRole");
            exit();
        }
        if($this->validPostalCode() === false){
            header("location: ../home.php?error=wrongPostalCode");
            exit();
        }
        if($this->isEmailTaken($this->email) === true){
            header("location: ../home.php?error=emailAlreadyTaken");
            exit();
        }

        //function that creates users address(because it is in separate table)
        $this->createAddress($this->address, $this->city, $this->postalCode);
        //function that creates user
        $this->createUser($this->role,$this->firstName,$this->lastName,$this->email,$this->pass1, $this->phone);

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

    //function that checks if phone number is correcrt length and if its just numbers
    private function validPhoneNumber(){
        if(strlen($this->phone) !== 10 || gettype($this->phone) !== "integer"){
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