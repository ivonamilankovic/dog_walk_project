<?php

class Create extends Dbconn{
    protected function setDog($dogName, $dogGender, $dogAge, $notes, $breed_id, $owner_id){
        $pdo = $this->setConnection();
        $pdoStatement = $pdo->prepare('INSERT INTO dog (dog_name, gender, age, notes, breed_id, owner_id) VALUES (?, ?, ?, ?, ?, ?);');

        if(!$pdoStatement->execute(array($dogName, $dogGender, $dogAge, $notes, $breed_id, $owner_id))){
            header("location: ../customer_dashboard/createDog.php?error=stmtfailed");
            exit();
        }
        $pdoStatement = null;
    }





}