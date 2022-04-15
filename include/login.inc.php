<?php

include_once '../class/dbconn.class.php';
include_once '../class/login.class.php';
include_once '../class/loginControler.class.php';

//get data from ajax
$username = $_POST['user'];
$password = $_POST['password'];

//create class that will log user on page
$login = new LoginControler($username,$password);
$login->LogUser();
