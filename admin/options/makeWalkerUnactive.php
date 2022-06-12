<?php

include_once '../../include/dbconfig.inc.php';

if(isset($_GET['id'])){
    $id=$_GET['id'];

    try{
        $conn = new PDO("mysql:host=localhost;dbname=brunette", 'brunette', 'pUrVSBrnoXxm5Kw');
        $sql = "UPDATE walker_details SET is_active = 0 WHERE walker_id=?";
        $stmt = $conn->prepare($sql);
        if(!$stmt->execute([$id])){
            echo 'Could not make walker not active';
        }
        else{
            header("location: ../admin.php?a=w");
        }
    }
    catch (Exception $ex){
        echo($ex -> getMessage());
    }

}