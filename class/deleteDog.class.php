<?php

class Delete extends Dbconn{
    protected function deleteDog($dog_id){
        $pdo = $this->setConnection();
        $pdoStatement = $pdo->prepare('DELETE FROM dog where id = ' .$dog_id);

        if(!$pdoStatement->execute()){
            header("location: ../customer_dashboard/deleteDog.php?error=stmtfailed");
            exit();
        }
        $pdoStatement = null;
    }

}