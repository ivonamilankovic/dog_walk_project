<?php

include_once '../../include/dbconfig.inc.php';

if(isset($_POST['update'])){
    $id=$_POST['update'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $notes = $_POST['notes'];
    $breed = $_POST['breed'];

    try{
        $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
        $sql = "UPDATE dog SET dog_name = ?, gender = ?, age =?, notes = ?, breed_id = ? WHERE id=?";
        $stmt = $conn->prepare($sql);
        if(!$stmt->execute([$name, $gender, $age, $notes, $breed, $id])){
            echo 'Could not update';
        }
        else{
            header("location: ../admin.php?a=d");
        }
    }
    catch (Exception $ex){
        echo($ex -> getMessage());
    }

}