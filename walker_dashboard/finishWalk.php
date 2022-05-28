<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location: ../pages/home.php");
}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Paw Walks - My walks</title>
        <link rel="stylesheet" type="text/css" href="../css/editProfileStyle.css">
        <link rel="stylesheet" href="../css/homeStyle.css">
        <link rel="stylesheet" href="../css/scrollbar.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
    <!--HEADER-->
<?php
require_once '../page_parts/header.php';
?>

    <div class="container">
        <div class="d-flex justify-content-center">
            <h1 class="p-4">Finish your walk!</h1>
        </div>
        <form action="../include/finishWalk.inc.php" method="post" id="finishWalkForm">
            <div class="d-flex justify-content-center">
                <textarea class="form-control" id="path" name="path" placeholder="Where have you been during the walk?" style="height: 400px; font-size: x-large"></textarea> <br>
            </div>
            <small id="errorPath" style="color: #ff0000"></small>
            <div class="d-flex justify-content-center">
                <input type="hidden" value="<?= isset($_GET['reservation_id']) ? $_GET['reservation_id']:""?>" name="reservation_id">
                <button type="submit" id="finish" name="finish" class="btn btn-success m-4">Finish!</button>
            </div>
        </form>

    </div>









    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../script/home.js"></script>
    <script src="../script/finishWalk.js"></script>
    <script src="../script/checkFunctions.js"></script>

    </body>
</html>

<?php
