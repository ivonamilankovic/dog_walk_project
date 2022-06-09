<?php

include_once '../../include/dbconfig.inc.php';

if(isset($_POST['ban'])){
    $a=$_POST['ban'];
    $tmp = explode(' ', $a);
    $id = $tmp[0];
    $site = $tmp[1];

    try{
        $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
        $sql = "UPDATE user SET is_banned = 1 WHERE id=?";
        $stmt = $conn->prepare($sql);
        if(!$stmt->execute([$id])){
            echo 'Could not ban user';
        }
        else{
            header("location: ../admin.php?a=".$site);
        }
    }
    catch (Exception $ex){
        echo($ex -> getMessage());
    }

}
