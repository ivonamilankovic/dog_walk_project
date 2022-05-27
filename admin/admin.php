<?php
session_start();
if(!isset($_SESSION['id']) && $_SESSION['role']!=="admin"){
    header("location: ../pages/home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Admin page</title>
    <link rel="stylesheet" href="../css/homeStyle.css">
    <link rel="stylesheet" href="../css/scrollbar.css">
    <style>
        .a{
            background-color: #9c7a97;
            border: 1px solid black;
            padding: 8px;
            text-decoration: none;
            color: black;
            border-radius: 5px;
        }
        .a:hover{
            color: white;
            background-color: black;
        }
    </style>
</head>

<body>

    <?php
    include_once '../page_parts/header.php';

    if(!isset($_GET['a'])){
    ?>

    <div class="mx-auto mt-5 text-center" style="display: block;">
        <h3>See all customers</h3>
        <a href="admin.php?a=c" class="a">Open</a>
        <h3 class="mt-4">See all walkers</h3>
        <a href="admin.php?a=w" class="a">Open</a>
        <h3 class="mt-4">See all walks</h3>
        <a href="admin.php?a=walk" class="a">Open</a>
        <h3 class="mt-4">See all breeds</h3>
        <a href="admin.php?a=b" class="a">Open</a>
        <h3 class="mt-4">See all dogs</h3>
        <a href="admin.php?a=d" class="a">Open</a>
    </div>

    <?php
    }
    else{
        if($_GET['a'] === 'c'){
            include_once 'allCustomers.php';
        }
        elseif($_GET['a'] === 'w'){
            include_once 'allWalkers.php';
        }
        elseif ($_GET['a'] === 'b'){
            include_once  'allBreeds.php';
        }
        elseif ($_GET['a'] === 'walk'){
            include_once 'allWalks.php';
        }elseif($_GET['a'] === 'd'){
            include_once  'allDogs.php';
        }
    }?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>