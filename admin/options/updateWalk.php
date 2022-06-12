<?php

include_once '../../include/dbconfig.inc.php';

if(isset($_POST['update'])){
    $id=$_POST['update'];
    $date =$_POST['date'];
    $start =$_POST['start'];
    $end =$_POST['end'];
    $dur =$_POST['dur'];
    $desc =$_POST['desc'];
    $path =$_POST['path'];

    if(empty($date) || empty($start) || empty($end) || empty($dur) || empty($desc)){
        header("location: ../admin.php?a=walk&e=empty");
        exit();
    }

    try{
        $conn = new PDO("mysql:host=localhost;dbname=brunette", 'brunette', 'pUrVSBrnoXxm5Kw');
        $sql = "UPDATE walk SET walk_date = ?, start_location = ?, end_location =?, description = ?, duration = ?, path =? WHERE id=?";
        $stmt = $conn->prepare($sql);
        if(!$stmt->execute([$date, $start, $end,$desc, $dur, $path, $id])){
            echo 'Could not update';
        }
        else{
            header("location: ../admin.php?a=walk");
        }
    }
    catch (Exception $ex){
        echo($ex -> getMessage());
    }

}