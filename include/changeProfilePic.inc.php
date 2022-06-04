<?php

require_once "./dbconfig.inc.php";

define('SITE_ROOT',realpath(dirname(__FILE__)));

$id = $_POST['id'];
$address = $_POST['address'];
$file = $_FILES['filename'];

$file_name = $_FILES['filename']['name'];
$file_location = $_FILES['filename']['tmp_name'];
$file_error = $_FILES['filename']['error'];
$file_size = $_FILES['filename']['size'];

$tmp = explode('.', $file_name);
$file_extension = end($tmp);
$file_new_name = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(15/strlen($x)) )),1,15)."." . $file_extension;
$file_new_location = '\profile_images\\';


if($file_extension == "jpg" || $file_extension == "jpeg" || $file_extension == "png") {

    if ($file_error != false) {
        header("location: ../". $address ."?e=fileError");
        //$er = ["error" => "fileError"];
        //echo json_encode($er);
        die();
    } else {
        if ($file_size > 100000) {
            header("location: ../". $address ."?e=bigImg");
            // $er = ["error" => "bigImg"];
           // echo json_encode($er);
            die();
        } else {
            if (!move_uploaded_file($file_location, SITE_ROOT . $file_new_location . $file_new_name)) {
                header("location: ../". $address ."?e=couldNotMoveImg");
                //$er = ["error" => "couldNotMoveImg"];
                //echo json_encode($er);
                die();
            }
            $sql = "UPDATE user set picture = '../include/profile_images/" . $file_new_name . "' , updated_at = ? WHERE id = ?";
            try {
                $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB, USER, PASS);
                $stmt = $conn->prepare($sql);
                if (!$stmt->execute([ date('Y-m-d H:i:s'),$id])) {
                    header("location: ../". $address ."?e=failedStmt");
                   // $er = ["error" => "failedStmt"];
                    //echo json_encode($er);
                    die();
                }
            } catch (Exception $ex) {
                echo($ex->getMessage());
            }
            header("location: ../". $address);
        }
    }

}else{
    header("location: ../". $address ."?e=wrongImgFormat");
    //$er = ["error" => "wrongImgFormat"];
    //echo json_encode($er);
    die();
}
