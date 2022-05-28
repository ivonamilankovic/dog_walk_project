<?php

include_once '../../include/dbconfig.inc.php';

if(isset($_POST['update'])){
    $i=explode(" ", $_POST['update']);
    $id = $i[0];
    $addrid = $i[1];
    $fn = $_POST['first_name'];
    $ln = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pic = $_POST['pic'];
    $ver = $_POST['is_verified'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $postCode = $_POST['PC'];

    try{
        $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
        $sql = "UPDATE user SET first_name = ?, last_name = ?, email = ?, phone_number = ?, picture = ? ,
                is_verified = ?, updated_at = ? WHERE id=?; 
                UPDATE address SET street = ?, city = ?, postal_code = ? WHERE id=?;";
        $stmt = $conn->prepare($sql);
        if(!$stmt->execute([$fn, $ln, $email, $phone, $pic, $ver, date('Y-m-d H:i:s') , $id, $street, $city, $postCode, $addrid])){
            echo 'Could not update user';
        }
        else{
            header("location: ../admin.php?a=c");
        }
    }
    catch (Exception $ex){
        echo($ex -> getMessage());
    }

}
