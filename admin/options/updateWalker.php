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
