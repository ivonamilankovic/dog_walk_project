<?php

include_once '../../include/dbconfig.inc.php';

if(isset($_POST['unban'])){
    $a=$_POST['unban'];
    $tmp = explode(' ', $a);
    $id = $tmp[0];
    $site = $tmp[1];

    try{
        $conn = new PDO("mysql:host=localhost;dbname=brunette", 'brunette', 'pUrVSBrnoXxm5Kw');
        $sql = "UPDATE user SET is_banned = 0 WHERE id=?";
        $stmt = $conn->prepare($sql);
        if(!$stmt->execute([$id])){
            echo 'Could not unban user';
        }
        else{
            header("location: ../admin.php?a=".$site);
        }
    }
    catch (Exception $ex){
        echo($ex -> getMessage());
    }

}