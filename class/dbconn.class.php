<?php 

include_once "../include/dbconfig.inc.php";

class Dbconn{

    protected function setConnection(){
        try{
            $dsn = "mysql:host=" . HOST . ";dbname=" . DB;
            $pdo = new PDO($dsn, USER, PASS);
            return $pdo; //it returns connection
        }
        catch(PDOException $e){
            echo "Error: " . $e->getMessage();
            die();
            //if there is a problem with connection to db, it will show on the screen
        }
    }

}