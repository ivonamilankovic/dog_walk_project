<?php

include_once '../../include/dbconfig.inc.php';

if(isset($_POST['delete'])){
    $id=$_POST['delete'];

    try{
        $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
        $sql = "UPDATE walk SET walker_id = 1 WHERE walker_id=?";
        $stmt = $conn->prepare($sql);
        if(!$stmt->execute([$id])){
            echo 'Could not change reservation';
        }
        else {
            $sql = "DELETE FROM user WHERE id=?;";
            $stmt = $conn->prepare($sql);
            if (!$stmt->execute([$id])) {
                echo 'Could not delete';
            } else {
                header("location: ../admin.php?a=w");
            }
        }
    }
    catch (Exception $ex){
        echo($ex -> getMessage());
    }

}
