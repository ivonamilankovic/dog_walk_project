<?php

include_once '../../include/dbconfig.inc.php';

if(isset($_POST['update'])){
    $i=explode(" ", $_POST['update']);
    $id = $i[0];
    $addrid = $i[1];
    $fn = $_POST['fn'];
    $ln = $_POST['ln'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pic = $_POST['pic'];
    $ver = $_POST['is_ver'];
    $street = $_POST['strt'];
    $city = $_POST['city'];
    $postCode = $_POST['PC'];
    $bio = $_POST['bio'];
    $breed = $_POST['breed'];


    if($fn === "" || $ln === "" || $email === "" || $phone === "" || $street === "" || $city === "" || $postCode === ""){
        header('location: ../admin.php?a=w&e=empty');
        exit();
    }

    if($ver != "1" || $ver != "0"){
        header('location: ../admin.php?a=w&e=verNotValid');
        exit();
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('location: ../admin.php?a=w&e=wrongFormat');
        exit();
    }

    if(strlen($phone) < 5 && strlen($phone) > 15){
        header('location: ../admin.php?a=w&e=wrongLengthPH');
        exit();
    }

    if(strlen($postCode) < 5 && strlen($postCode) > 10){
        header('location: ../admin.php?a=w&e=wrongLengthPC');
        exit();
    }

    if(!is_numeric($phone)){
        header('location: ../admin.php?a=w&e=notNumPH');
        exit();
    }

    if(!is_numeric( $postCode)){
        header('location: ../admin.php?a=w&e=notNumPC');
        exit();
    }

    try{
        $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
        $sql = "UPDATE user SET first_name = ?, last_name = ?, email = ?, phone_number = ?, picture = ? ,
                is_verified = ?, updated_at = ? WHERE id=?; 
                UPDATE address SET street = ?, city = ?, postal_code = ? WHERE id=?;
                UPDATE walker_details SET biography = ? WHERE walker_id = ?;
                UPDATE walker_favourite_breeds SET breed_id = ? WHERE walker_id = ? ";
        $stmt = $conn->prepare($sql);
        if(!$stmt->execute([$fn, $ln, $email, $phone, $pic, $ver, date('Y-m-d H:i:s') , $id, $street, $city, $postCode, $addrid, $bio, $id, $breed, $id])){
            echo 'Could not update user';
        }
        else{
            header("location: ../admin.php?a=w");
        }
    }
    catch (Exception $ex){
        echo($ex -> getMessage());
    }

}
