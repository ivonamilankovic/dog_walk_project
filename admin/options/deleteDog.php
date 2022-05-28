<?php

include_once '../../include/dbconfig.inc.php';

if(isset($_POST['delete'])){
    $id=$_POST['delete'];

    try{
        $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
        $sql = "DELETE FROM dog WHERE id=?";
        $stmt = $conn->prepare($sql);
        if(!$stmt->execute([$id])){
            echo 'Could not delete';
        }
        else{
            header("location: ../admin.php?a=d");
        }
    }
    catch (Exception $ex){
        echo($ex -> getMessage());
    }

}