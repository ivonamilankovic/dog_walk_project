<?php

include_once '../../include/dbconfig.inc.php';

if(isset($_POST['delete'])){
    $i=explode(" ", $_POST['delete']);
    $id = $i[0];
    $addrid = $i[1];

    try{
        $conn = new PDO("mysql:host=localhost;dbname=brunette", 'brunette', 'pUrVSBrnoXxm5Kw');
        $sql = "DELETE FROM user WHERE id=?; DELETE FROM address WHERE id=?;";
        $stmt = $conn->prepare($sql);
        if(!$stmt->execute([$id, $addrid])){
            echo 'Could not delete';
        }
        else{
            header("location: ../admin.php?a=c");
        }
    }
    catch (Exception $ex){
        echo($ex -> getMessage());
    }

}