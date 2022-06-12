<?php

include_once '../../include/dbconfig.inc.php';

if(isset($_POST['delete'])){
    $id=$_POST['delete'];

    try{
        $conn = new PDO("mysql:host=localhost;dbname=brunette", 'brunette', 'pUrVSBrnoXxm5Kw');
        $sql = "DELETE FROM breeds WHERE id=?";
        $stmt = $conn->prepare($sql);
        if(!$stmt->execute([$id])){
            echo 'Could not delete';
        }
        else{
            header("location: ../admin.php?a=b");
        }
    }
    catch (Exception $ex){
        echo($ex -> getMessage());
    }

}