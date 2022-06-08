<?php

class Delete extends Dbconn{
    protected function deleteDog($dog_id){
        $pdo = $this->setConnection();
        $pdoStatement = $pdo->prepare('UPDATE walk_dogs SET dog_id = 1 WHERE dog_id ='.$dog_id.';DELETE FROM dog where id = ' .$dog_id);

        if(!$pdoStatement->execute()){
            header("location: ../customer_dashboard/deleteDog.php?error=stmtfailed");
            exit();
        }
        $pdoStatement = null;
    }

}