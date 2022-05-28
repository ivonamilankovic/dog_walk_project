<?php

include_once '../../include/dbconfig.inc.php';

if(isset($_POST['update'])){
    $id=$_POST['update'];
    $bred_name = $_POST['breed_name'];

    try{
        $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
        $sql = "UPDATE breeds SET breed_name = ? WHERE id=?";
        $stmt = $conn->prepare($sql);
        if(!$stmt->execute([$bred_name, $id])){
            echo 'Could not update';
        }
        else{
            header("location: ../admin.php?a=b");
        }
    }
    catch (Exception $ex){
        echo($ex -> getMessage());
    }

}