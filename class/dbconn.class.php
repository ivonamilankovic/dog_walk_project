<?php 

include_once "../include/dbconfig.inc.php";

class Dbconn{
    public $conn;
    protected function setConnection(){
        try{
            $dsn = "mysql:host=" . HOST . ";dbname=" . DB;
            $conn = new PDO($dsn, USER, PASS);
            return $conn; //it returns connection

        }
        catch(PDOException $e){
            //echo "Error: " . $e->getMessage();
            die();
            //if there is a problem with connection to db, it will show on the screen
        }
    }

}